<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/cee8dd5548.js" crossorigin="anonymous"></script>
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

	<title>Users</title>
</head>
<body>
    <!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class="fa-solid fa-graduation-cap"></i>
			<span class="text">Education Non-Disparity</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="index.html">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-user'></i>
					<span class="text">Mi cuenta</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-notepad'></i>
					<span class="text">Actividades</span>
				</a>
			</li>
			<li>
				<a href="users.html">
					<i class="fa-solid fa-users"></i>
					<span class="text">Usuarios</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa-solid fa-person-circle-question"></i>
					<span class="text">Solicitudes</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Mensajes</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class="fa-solid fa-house"></i>
					<span class="text">Inicio</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class="fa-solid fa-right-from-bracket"></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

    <!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				
			</form>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/wil.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Solicitudes</a>
						</li>
					</ul>
				</div>
                
			</div>
            <form class="user-search" action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<div class="table-data">
                
				<div class="order">
					<div class="head">
						<h3>Usuarios</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Usuario</th>
                                <th>Rol</th>
								<th>Informacion</th>
								<th>Fecha</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/dik.png">
									<p>Derick Fernandez</p>
								</td>
                                <td>Beneficiario</td>
                                <td>Ver datos</td>
								<td>01-10-2024</td>
								<td><span class="status completed">Aceptado</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/san.png">
									<p>Sandra Arechiga</p>
								</td>
								<td>Voluntario</td>
                                <td>Ver datos</td>
								<td>01-10-2024</td>
								<td><span class="status pending">Pendiente</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/fer.png">
									<p>Fernando Perez</p>
								</td>
								<td>Beneficiario</td>
                                <td>Ver datos</td>
								<td>01-10-2024</td>
								<td><span class="status pending">Pendiente</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/wil.png">
									<p>Alexis</p>
								</td>
								<td>Voluntario</td>
                                <td>Ver datos</td>
								<td>01-10-2024</td>
								<td><span class="status rejected">Rechazado</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/angel.png">
									<p>Jhoe Mama</p>
								</td>
								<td>Beneficiario</td>
                                <td>Ver datos</td>
								<td>01-10-2024</td>
								<td><span class="status completed">Aceptado</span></td>
							</tr>
						</tbody>
					</table>
				</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
</body>
<script src="{{asset('js/script.js')}}"></script>
</html>