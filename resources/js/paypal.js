// comportamiento del modal y boton paypal
function closeModalOnOutsideClick(event) {
    const modal = document.getElementById('paymentModal');
    // Si el clic es fuera del contenido del modal, cerrarlo
    if (event.target === modal) {
        closeModal();
    }
}

function closeModal() {
    const modal = document.getElementById('paymentModal');
    modal.classList.add('hidden');
}

function openModal() {
    const modal = document.getElementById('paymentModal');
    modal.classList.remove('hidden');

    // obtener el elemento que recibe la funcion
    cantidadDonate = document.getElementById('custom-amount').value;

    const paypalContainer = document.getElementById('paypal-button-container');
    paypalContainer.innerHTML = '';  // Vaciar el contenedor para evitar duplicados

    document.getElementById('donation-amount').textContent = `Usted donará: $${cantidadDonate}`;  // Mostrar la cantidad en el modal

    // Renderizar el botón de PayPal
    paypal.Buttons({
        style: {
            color: 'blue',
            shape: 'pill',
            label: 'donate',
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                application_context: {
                    shipping_preference: 'NO_SHIPPING'
                },
                purchase_units: [{
                    amount: {
                        value: cantidadDonate,
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                console.log('Transacción aprobada, enviando datos al servidor...');
        
                fetch('../public/donations/guardar-transaccion', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        payer_email: details.payer.email_address,
                        payer_name: details.payer.name.given_name,
                        payer_surname: details.payer.name.surname,
                        status: details.status,
                        payer_id: details.payer.payer_id,
                        create_time: details.create_time,
                        update_time: details.update_time,
                        amount: details.purchase_units[0].amount.value,
                        currency: details.purchase_units[0].amount.currency_code,
                        transaction_id: details.id,
                        
                    }),
                    
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Datos guardados correctamente.');
                        //redireccionar a la página de agradecimiento
                        window.location.href = './gracias/' + details.id;
                    } else {
                        alert('Error al guardar los datos.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ocurrió un error al guardar los datos.');
                });
            });
        }
        ,
        onError: function(err) {
            console.error('Error en PayPal:', err);
        }
    }).render('#paypal-button-container');
}


// mostrar el modal
    // Seleccionar los botones de donación y el input de cantidad personalizada
    const donationButtons = document.querySelectorAll('.donation-btn');
    const customAmountInput = document.getElementById('custom-amount');
    let cantidadDonate = 0; // Variable para guardar la cantidad de donación

    // Añadir evento a cada botón de donación
    donationButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Obtener la cantidad del atributo data-amount
            const amount = this.getAttribute('data-amount');
            // Colocar la cantidad en el input
            customAmountInput.value = amount;
        });
    });

    // Evento para el botón de continuar
    document.getElementById('continuar-btn').addEventListener('click', function() {
        // Guardar la cantidad que esté en el input en la variable cantidadDonate
        cantidadDonate = customAmountInput.value;

        openModal(); // Abrir el modal y proceder con PayPal
    });


