<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome to ShopEase</title>
  <style>
    /* Fallback if email client supports internal CSS */
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f7fa;
    }
  </style>
</head>
<body style="font-family: 'Segoe UI', sans-serif; margin: 0; padding: 0; background-color: #f5f7fa;">

  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
    <tr>
      <td style="padding: 20px; text-align: center; background-color: #2d89ef; color: white;">
        <h1 style="margin: 0; font-size: 28px;">Welcome to ShopEase</h1>
        <p style="margin: 5px 0 0;">Your ultimate shopping partner</p>
      </td>
    </tr>

    <tr>
      <td style="padding: 30px; text-align: left;">
        <h2 style="color: #333333;">Hello {{ $subscriber->email ?? 'Customer' }},</h2>
        <p style="font-size: 16px; color: #555555; line-height: 1.6;">
          We're thrilled to have you on board! At <strong>ShopEase</strong>, we strive to provide you with the best products and smoothest shopping experience.
        </p>

        <p style="font-size: 16px; color: #555555; line-height: 1.6;">
          Start exploring our wide range of categories, exclusive deals, and new arrivals curated just for you.
        </p>

        <div style="text-align: center; margin: 30px 0;">
          <a href="{{ url('/') }}" style="background-color: #2d89ef; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-size: 16px;">Start Shopping</a>
        </div>

        <p style="font-size: 14px; color: #999999;">If you have any questions, feel free to reply to this email — we're always here to help!</p>
      </td>
    </tr>

    <tr>
      <td style="background-color: #f0f0f0; padding: 20px; text-align: center; font-size: 12px; color: #888888;">
        &copy; {{ date('Y') }} ShopEase. All rights reserved.<br>
        <a href="{{ url('/') }}" style="color: #2d89ef; text-decoration: none;">Visit Website</a>
      </td>
    </tr>

    <tr>
  <td style="padding: 20px; text-align: center;">
    <p style="font-size: 14px; color: #777777;">
      Don’t want to receive these emails?
      <a href="{{route('https://09caf7e038e7.ngrok-free.app/api/unsubscribed/'.$subscriber->email)  }}" style="color: #2d89ef; text-decoration: underline;">Unsubscribe</a>
    </p>
  </td>
</tr>

  </table>

</body>
</html>
