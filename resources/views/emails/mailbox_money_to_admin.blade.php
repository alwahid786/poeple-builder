<!-- New design -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>
<style></style>

<body>
  <div class="header" style="
        margin-top: 50px;
        margin-bottom: 20px;
        text-align: center;
      ">
    <h1 style="color: #3b5999; margin-bottom: 20px">User Detail</h1>
  </div>
  <table style="border-collapse: collapse; width: 100%;">
    <tr>
      <td style="width:50%; text-align: left; padding:2px 8px; color: #3b5999">
        Name : <span style="text-align: left; padding:2px 8px; color: #404040">{{ $name ?? '-' }}</span>
      </td>
    </tr>
    <tr>
      <td style="width:50%; text-align: left; padding:2px 8px; color: #3b5999">
        Email : <span style="text-align: left; padding:2px 8px; color: #404040">{{ $email ?? '-'  }}</span>
      </td>
    </tr>
    <tr>
      <td style="width:100%; text-align: left; padding: 8px; color: #404040">
        <p style="color: #404040; font-weight:400">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
      </td>
    </tr>

  </table>
  <hr />
</body>

</html>