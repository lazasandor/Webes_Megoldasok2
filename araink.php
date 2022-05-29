<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="style.css">
<?php include("menu.php") ?>
  <style type="text/css">

  table {
    border-collapse:collapse;
    table-layout:fixed;
    width:100%;
    height: 50%;
    
  }

  th {
    display:none;
  }

  td, th {
    height:53px
  }

  td,th {
     border:1px solid #DDD;
     padding:10px;
     empty-cells:show;
  }
  td,th {
    text-align:left;
  }

  td+td, th+th {
    text-align:center;
    display:none;
  }

  td.default {
    display:table-cell;
  }

  .sep {
    
    font-weight:bold;
    font-size: 150%;
    color: #ffffff;
  }

  @media (min-width: 640px) {

    td,th {
      display:table-cell !important;
    }

    td,th {
      width: 330px;

    }

    td+td, th+th {
      width: auto;
    }

  }

  </style>

  <article>

  <table>

    <thead>
      <tr class="sep">
        <th>Vetítés típusai</th>
        <th>Junior</th>
        <th>Diák</th>
        
        <th>Felnőtt</th>
      </tr>
    </thead>

    <tbody>

      <tr class="sep">
        <td> 2D </td>
        <td><span>1000Ft</span></td>
        <td><span>1100Ft</span></td>
        <td><span>1300Ft</span></td>
      </tr>

      <tr class="sep">
        <td> 3D </td>
        <td><span>1200Ft</span></td>
        <td><span>1300Ft</span></td>
        <td><span>1600Ft</span></td>
      </tr>

      <tr class="sep">
        <td> 4DX </td>
        <td><span>1600Ft</span></td>
        <td><span>1900Ft</span></td>
        <td><span>2100Ft</span></td>
      </tr>

    </tbody>
    
  </table>

  </article>

</body>

</html>
