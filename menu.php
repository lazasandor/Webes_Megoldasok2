<style>
.topnav {
	overflow: hidden;
	background-color: #575757;
}

#menu{
	border-bottom: 0.2em solid #404040;
	border-bottom-left-radius: 20px 10px;
	border-bottom-right-radius: 20px 10px;
    height: 7vh;
    width: 100%;
    display: grid;
    grid-template-rows: 100%;
    grid-template-columns: 15% 15% 15% 15% 15% 15% 15%;
    grid-template-areas: "B0 B1 B2 B3 B4 B5 B6";
    opacity: 0.95;
    margin-bottom: 50px;
}

#button0{grid-area: B0;}
#button1{grid-area: B1;}
#button2{grid-area: B2;}
#button3{grid-area: B3;}
#button4{grid-area: B4;}
#button5{grid-area: B5;}
#button6{grid-area: B6;}


div.topnav > a {
	display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    color: white;
    text-decoration: none;
    font-size: large;
}
.topnav a:not(:first-child):hover {
	background-color: #bc161b;
	color: white;
}

.topnav a:not(:first-child).active {
	background-color: #bc161b;
	color: white;
}

.topnap > a :first-child{
	background-color: #575757;
}
</style>
<div id="menu" class="topnav">
    <a id="button0" href="/index.php">HOME</a>
    <a id="button1" href="/filmek.php">FILMEK</a>
    <a id="button2" href="/foglalas.php">FOGLALÁS</a>
    <a id="button3" href="/araink.php">ÁRAINK</a>
    <a id="button4" href="/elerhetosegek.php">ELÉRHETŐSÉGEK</a>
    <a id="button5" href="/foglalasaim.php">FOGLALÁSAIM</a>
    <a id="button6" href="?logout">KILÉPÉS</a>
</div>

<?php 
  if(isset($_GET["logout"])) {

    unset($_SESSION["username"]);

    header("location: /index.php");
  }
?>