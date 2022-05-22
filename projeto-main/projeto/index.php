




<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <header style="padding: 10px;">
      <h5>Brazilian Car History</h5>
      </header>
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="">Link</a>
              </li>
              <li>
                <a class="nav-link" href="">AAAA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cadastrodeveiculo.php">Link</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="text" placeholder="Search">
              <button class="btn btn-primary" type="button">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <main>
        <?php
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";
        
        class TableRows extends RecursiveIteratorIterator {
          function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
          }
        
          function current() {
            return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
          }
        
          function beginChildren() {
            echo "<tr>";
          }
        
          function endChildren() {
            echo "</tr>" . "\n";
          }
        }
        
        $servername = "localhost";
        $username = "username";
        $password = "";
        $dbname = "myDBPDO";
        
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname, $username,no=$password");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
          $stmt->execute();
        
          // set the resulting array to associative
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
          }
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
        ?>
      </main>
  </body>
</html>