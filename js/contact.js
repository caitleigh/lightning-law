< !DOCTYPE html >
  <html lang="en">
    <head>
      <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
</head>
        <body>
          <form method="post" action="http://localhost:7071/api/mailer">
            <input type="hidden" name="from" value="john@codefellows.com" />
            <input type="hidden" name="subject" value="Thank You" />
            <input type="email" name="to" placeholder="email@domain.com" />
            <input type="hidden" name="text" value="This is some text in an email" />
            <button type="submit">Send It</button>
          </form>
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script>
            $('form').on('submit', function (e) {
              e.preventDefault();
      let fields = $(this).serializeArray();
      let data = fields.reduce((d, v) => {
              d[v.name] = v.value;
        return d;
      }, {});
      $.ajax('http://localhost:7071/api/mailer', {
              method: 'post',
        data: data
      })
        .then(response => {
              alert('Message Sent!')
            })
        .catch(error => {
              console.error(error)
            });
    });
  </script>
        </body>
</html>