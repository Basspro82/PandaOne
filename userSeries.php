<table id="series" class="series display" style="width:100%">
  <thead>
      <tr>
          <th></th>
          <th>Title</th>
          <th>Description</th>
          <th>Year</th>
          <th>Genre</th>
          <th>Rate</th>
      </tr>
  </thead>
  <tbody>
      <?php foreach ($series as $serie) { ?>    
      <tr>
         <td><a href="<?php echo $serie->url ?>"><img src="<?php echo $serie->poster ?>" class="img-fluid" alt="<?php echo $serie->title ?>"></a></td> 
         <td><a href="<?php echo $serie->url ?>"><?php echo $serie->title ?></a></td>
         <td><?php echo $serie->plot ?></td>
         <td><?php echo $serie->year ?></td>
         <td><?php echo $serie->genre ?></td>
         <td>5</td> 
      </tr>
      <?php } ?>
  </tbody>
</table>    