<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<style>

    ::-webkit-scrollbar{
        display: none;
    }
    .id {
        display: none;
    }
</style>

<body>
    <header>


    </header>
    <main class="container-fluid">
        <div class="">
            <br>
            <form action="add_data.php" id="0" method="POST" onchange="showButton(this.id)">
                <div class="table-responsive">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th scope="col" class="id">id</th>
                                <th scope="col">name</th>
                                <th scope="col">roll</th>
                                <th scope="col">class</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row" class="id">
                                    <input placeholder="id" readonly type="text" name="id" id="id" readonly>
                                </td>
                                <td>
                                    <input placeholder="name" type="text" name="name" id="name">
                                </td>
                                <td>
                                    <input type="text" placeholder="roll" name="roll" id="roll">
                                </td>
                                <td>
                                    <input type="text" placeholder="class" name="class" id="class">
                                </td>
                                <td>
                                    <input type="submit" name="submit" value="Add new data">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            <br>
            <hr>
            <br>

            <?php
            include('config.php');

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM crud";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

                    echo '
              <form action="update_data.php" id="' . $row["id"] . '" method="post" onchange="showButton()">
              <div class="table-responsive">
                  <table class="table border">
                      <tbody>
                          <tr class="">
                              <td scope="row" class="id">
                                  <input value="' . $row["id"] . '" placeholder="id" readonly type="text" name="id" id="id" readonly>
                              </td>
                              <td>
                                  <input value="' . $row["name"] . '" placeholder="name" type="text" name="name" id="name">
                              </td>
                              <td>
                                  <input value="' . $row["roll"] . '" type="text" placeholder="roll" name="roll" id="roll">
                              </td>
                              <td>
                                  <input value="' . $row["class"] . '" type="text" placeholder="class" name="class" id="class">
                              </td>
                              <td>
                              <a href="delete_data.php?id=' . $row["id"] . '"><img width="25px" style="margin-right:10px;" src="https://cdn-icons-png.flaticon.com/128/3699/3699522.png"></a>
                                  <input type="submit" name="submit" value="update">
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </form>

              ';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>

        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
    <script>
        function showButton(id) {
            console.log(id);
        }
    </script>
    <script>
        // program to generate random strings


        function randomIntFromInterval(min, max) { // min and max included 
            return Math.floor(Math.random() * (max - min + 1) + min)
        }

        // declare all characters
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        function generateString(length) {
            let result = ' ';
            const charactersLength = characters.length;
            for (let i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }

            return result;
        }

        function randomdata() {
            let vclass = generateString(1).toUpperCase();
            document.getElementById("name").value = generateString(randomIntFromInterval(5, 15)).toLowerCase()
            document.getElementById("roll").value = vclass + randomIntFromInterval(1000, 2000);
            document.getElementById("class").value = vclass
        }
        randomdata()
    </script>
</body>

</html>