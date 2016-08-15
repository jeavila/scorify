<table class="table table-hover">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Cuenta</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $key => $row): ?>
    <tr>
      <td><?=$row->nombre?></td>
      <td><?=$row->cuenta?></td>
      <td><?=$row->email?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
