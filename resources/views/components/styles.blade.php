@layer components {
    .a-hover::after {
        content: "";
        position: absolute;
        bottom: -2px;
        left: 50%;
        width: 0%;
        height: 2px;
        background-color: #ECDFCC;
        transition: width 400ms cubic-bezier(0.25, 0.8, 0.25, 1), left 400ms cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .a-hover:hover::after {
        width: 95%;
        left: 0%;
    }

    @keyframes smooth-bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); } /* Mueve 2 cm hacia arriba */
    }

    .smooth-bounce {
        animation: smooth-bounce 2s infinite ease-in-out;
    }

    @keyframes hover-bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(5px); } /* Mueve 1 cm hacia abajo */
    }
    
    .group:hover .hover-bounce-img {
        animation: hover-bounce 1.5s infinite ease-in-out forwards;
    }

    .merriweather-bold {
        font-family: "Merriweather", serif;
      }

    #tooltip {
        pointer-events: none; /* El tooltip no interferirá con el cursor */
        position: absolute;
        z-index: 10;
    }

    .scroll-animation {
        opacity: 0;
        transform: translateY(25px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    
    .scroll-animation.visible {
        opacity: 1;
        transform: translateY(0);
    }
}