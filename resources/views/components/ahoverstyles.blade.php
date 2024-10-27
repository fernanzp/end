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
}