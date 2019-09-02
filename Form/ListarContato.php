<table border="2">
    <tr>
      <td>id</td>  
      <td>Nome</td>
    </tr>
    <?php while($dado = $con->fetch_array()) { ?>
    <tr>
     
      <td><?php echo $dado["id"];?></td>
      <td><?php echo $dado['nome']; ?></td>
      
     
          </tr>
    <?php } ?>
  </table>
