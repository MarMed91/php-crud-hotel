<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script id="person-template" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.1.0/handlebars.min.js" charset="utf-8" type="text/javascript">
    <div class="price" data-id ="{{ id }}">
        <i class="delete fas fa-trash-alt"></i>
        <i class="edit fas fa-pencil-alt"></i>
        <h1 class="{{ title }}">{{ price }}</h1>
        <ul>
            <li class="created_at"></li>
        </ul>
    </div>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js"></script>
    <title></title>
  </head>
  <body>
      <h1>Ospiti</h1>
      <div class="prices"></div>

 </body>
</html>
