<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error: 404</title>

  <style>
    @import url("https://fonts.googleapis.com/css?family=Nunito+Sans");

    :root {
      --blue: #0e0620;
      --white: #f1f3f4;
      --skyblue: #3db2ff;
    }

    body {
      font-family: "Nunito Sans";
      color: var(--blue);
      font-size: 1em;
      width: 100vw;
      min-height: 100vh;
      background-color: var(--white);
    }

    .container {
      position: relative;
      width: 100%;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .ccontent {
      width: 50%;
      height: fit-content;
      padding: 2rem;
    }

    h1 {
      font-size: 7.5em;
      margin: 15px 0px;
      font-weight: bold;
    }

    h2 {
      font-weight: bold;
    }

    .btn {
      background: transparent;
      position: relative;
      padding: 8px 50px;
      border-radius: 30px;
      cursor: pointer;
      font-size: 1em;
      letter-spacing: 2px;
      transition: 0.2s ease;
      font-weight: bold;
      margin: 5px 0px;
      border: 4px solid var(--skyblue);
    }

    .btn:hover {
      color: var(--white);
      background: var(--skyblue);
      transition: 0.2s ease;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="ccontent">
      <h1>404</h1>
      <h2>UH OH! You're lost.</h2>
      <p>The page you are looking for does not exist.
        How you got here is a mystery. But you can click the button below
        to go back to the homepage.
      </p>
      
      <a href="index.php">
      <button class="btn green">HOME</button>
      </a>
    </div>
  </div>

</body>

</html>