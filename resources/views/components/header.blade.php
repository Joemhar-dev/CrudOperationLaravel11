<header>
    <div class="logo">
        <h1>LOGO</h1>

    </div>
    <div class="nav-menu">
            <ul>
                <a><li>Home</li></a>
                <a><li>Products</li></a>
                <a><li>About</li></a>
                <a><li>Services</li></a>
            </ul>
    </div>
    <div class="user-icon">

    </div>
</header>
<style>
header{
    width: 100%;
    display: flex;
    background-color: #4617b4;
    /* background-color: #f5f6fa; */
    border-bottom: .5px solid #dcdde1;
}
.logo{
    width: 20%;
    position: relative;
    background: transparent;
    backdrop-filter: blur(10px);

}
.logo h1{
    position: absolute;
    font-weight: bold;
    top: 15px;
    left: 20px;
}
.nav-menu{
    width: 50%;
    display:flex;
    padding: 0;

}
.nav-menu ul{
    display: flex;
    align-items: flex-end;
    width: 100%;
    justify-content: center;
    margin: 0;
    padding: 0;
}
.nav-menu ul li{
    display: inline-block;
    list-style: none;
    cursor: pointer;
    color: #ffff;
    font-size: 3vh;
    transition: 0.5s;
    padding: 20px;

}
.nav-menu ul a{
}
.nav-menu ul li:hover{
    background-color: #4617b4;
    color: #000000;
    /* transform: skew(-20deg); */
}
</style>

