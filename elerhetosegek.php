<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="style.css">

<?php include("menu.php") ?>

  <style type="text/css">

* {
    padding:0;
    margin:0;
    outline: 0;
  }

  

  

  .sep {
    font-weight:bold;
    
    color: #ffffff;
  }

  .sep1 {
    font-weight:bold;
    font-size: 150%;
    color: #ffffff;
  }

  



  .example_a {
    color: #fff !important;
    text-transform: uppercase;
    text-decoration: none;
    background: #bc161b;
    padding: 5px;
    border-radius: 5px;
    display: inline-block;
    border: none;
    transition: all 0.4s ease 0s;
  }

  .example_a:hover {
    letter-spacing: 1px;
    -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
    -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
    box-shadow: 5px 40px -10px rgba(0,0,0,0.57);
    transition: all 0.4s ease 0s;
  }

  </style>

  <article>

  <table>

    <tbody>

      <tr>
        <td class="sep1"> Elérhetőségeink </td>
      </tr>

      <tr>
        <td class="sep"> Facebook </td>
        <td>
          <div class="button_cont" align="center">
            <a class="example_a" href="http://www.facebook.com/" target="_blank"> Facebook </a>
          </div>
        </td>
      </tr>

      <tr>
        <td class="sep"> Instagram </td>
        <td>
          <div class="button_cont" align="center">
            <a class="example_a" href="http://www.instagram.com/" target="_blank"> Instagram </a>
          </div>
        </td>
      </tr>

      <tr>
        <td class="sep"> Cím </td>
        <td>
          <span class="sep"> Debrecen, Random utca, 1234. szám </span>
        </td>
      </tr>

    </tbody>
  </table>

  </article>



</body>
</html>
