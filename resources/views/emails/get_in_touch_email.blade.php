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
    <div
      class="header"
      style="
        max-width: 1000px;
        margin-top: 50px;
        margin-bottom: 20px;
        text-align: center;
      "
    >
      <h1 style="color: #3b5999; margin-bottom: 20px">Contact Form</h1>
    </div>
    <table style="border-collapse: collapse; width: 100%; max-width: 1000px">
      <tr>
        <th style="white-space:nowrap; text-align: left; padding: 8px; color: #3b5999">
          First Name :
        </th>
        <td style="text-align: left; padding: 8px">{{ $first_name ?? '-' }}</td>
        <th style="white-space:nowrap; text-align: left; padding: 8px; color: #3b5999">
          Last Name:
        </th>
        <td style="text-align: left; padding: 8px">{{ $last_name ?? '-'  }}</td>
      </tr>
      <tr>
        <th style="white-space:nowrap; text-align: left; padding: 8px; color: #3b5999">
          Phone Number :
        </th>
        <td style="text-align: left; padding: 8px">{{ $phone_number ?? '-'  }}</td>
        <th style="white-space:nowrap; text-align: left; padding: 8px; color: #3b5999">Email :</th>
        <td style="text-align: left; padding: 8px">{{ $email ?? '-'  }}</td>
      </tr>
      <tr>
        <th style="white-space:nowrap; text-align: left; padding: 8px; color: #3b5999">Message:</th>
        <td colspan="3" style="text-align: left; padding: 8px">{{ $message ?? '-'  }}</td>
      </tr>
    </table>
    <hr />
  </body>
</html>
