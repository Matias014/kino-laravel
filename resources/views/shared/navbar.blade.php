<style>
    html,
    body {
        position: relative;
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    body {
        font-family: Arial, sans-serif;
        background: #eee;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    header,
    footer {
        background-color: #201919;
        color: white;
        padding: 10px 20px;
        text-align: center;
    }

    nav {
        background-color: #04300c;
        padding: 10px 0;
    }

    .links {
        display: flex;
        justify-content: center;
        gap: 20px;
        position: relative;
    }

    .links a {
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .links a:hover {
        background-color: #29a01a;
        color: white;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #04300c;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 5px;
    }

    .dropdown-content a {
        padding: 10px 20px;
        text-align: left;
        text-decoration: none;
        display: block;
        color: white;
        transition: background-color 0.3s ease;
        border-radius: 5px;
    }

    .dropdown-content a:hover {
        background-color: #29a01a;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #29a01a;
    }
</style>
