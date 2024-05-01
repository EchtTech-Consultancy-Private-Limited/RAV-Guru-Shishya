<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Report</title>
</head>
<body>
    <h2 style="font-family: Arial, sans-serif; color: #333;">Your Daily Report for [{{ date('d-m-Y') }}]</h2>
    <p style="font-family: Arial, sans-serif; color: #333;">Dear [{{ $user->firstname }} {{ $user->lastname }}],</p>
    <p style="font-family: Arial, sans-serif; color: #333;">I hope this email finds you well. Attached, you will find your daily report summarizing the day's activities and progress.</p>
    <p style="font-family: Arial, sans-serif; color: #333;">Thank you for your attention to this report, and I look forward to our continued collaboration.</p>
    <p style="font-family: Arial, sans-serif; color: #333;">Best regards,<br>[GSP]</p>
</body>
</html>
