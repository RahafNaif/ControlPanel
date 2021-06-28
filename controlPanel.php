<?php
    if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

    if (!mysqli_select_db($database, "robotControl"))
    die("<p>Could not open URL database</p>");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="controlPanel.css?<?php echo time(); ?>">
        <title>Robot Control Panel</title>
    </head>
    <body>
        <div class="header">
            <h3>Robot Control Panel</h3>
        </div>
        <div class="container">
            <form action="controlPanel.php" method="POST">
            <div class="box">
                <div class="range">
                    <p>Engine 1</p>
                    <span></span>
                    <input type="range" min="0" max="180" value="0" id="slider1" name="en1">
                </div>
                <div class="value" id="value1">100</div>
            </div>
            <div class="box">
                <div class="range">
                    <p>Engine 2</p>
                    <span></span>
                    <input type="range" min="0" max="180" value="0" id="slider2" name="en2">
                </div>
                <div class="value" id="value2">100</div>
            </div>
            <div class="box">
                <div class="range">
                    <p>Engine 3</p>
                    <span></span>
                    <input type="range" min="0" max="180" value="0" id="slider3" name="en3">
                </div>
                <div class="value" id="value3">100</div>
            </div>
            <div class="box">
                <div class="range">
                    <p>Engine 4</p>
                    <span></span>
                    <input type="range" min="0" max="180" value="0" id="slider4" name="en4">
                </div>
                <div class="value" id="value4">100</div>
            </div>
            <div class="box">
                <div class="range">
                    <p>Engine 5</p>
                    <span></span>
                    <input type="range" min="0" max="180" value="0" id="slider5" name="en5">
                </div>
                <div class="value" id="value5">100</div>
            </div>
            <div class="box">
                <div class="range">
                    <p>Engine 6</p>
                    <span></span>
                    <input type="range" min="0" max="180" value="0" id="slider6" name="en6">
                </div>
                <div class="value" id="value6">100</div>
            </div>
            <div class="buttons">
                <input type="submit" value="Save" name="save">
                <input type="submit" value="Run" id="run" name="run">
            </div>
            </form>

            <?php
                if(isset($_POST['save'])){
                    $engine1 = $_POST['en1'];
                    $engine2 = $_POST['en2'];
                    $engine3 = $_POST['en3'];
                    $engine4 = $_POST['en4'];
                    $engine5 = $_POST['en5'];
                    $engine6 = $_POST['en6'];
                }

                $query = "INSERT INTO Engines(engine1,engine2,engine3,engine4,engine5,engine6) VALUES('".$engine1."','".$engine2."','".$engine3."','".$engine4."','".$engine5."','".$engine6."');";
                $res=mysqli_query($database,$query);

                if(isset($_POST['run'])){
                    $query1 = "SELECT engine1, engine2, engine3, engine4, engine5, engine6 FROM Engines";
                    $result = mysqli_query($database, $query1);
                    $rowcount=mysqli_num_rows($result);
                    $count = 0;

                    if ($result && $rowcount>0) {
                        while ($data = mysqli_fetch_assoc($result)) {
                            if($count==0){
                                print '<div class="run">';
                                print '<div class="line">';
                                print'<p>Engine 1:</p>';
                                print'<span>'.$data['engine1'].'</span>';
                                print'</div>';
                                print '<br><div class="line">';
                                print'<p>Engine 2:</p>';
                                print'<span>'.$data['engine2'].'</span>';
                                print'</div>';
                                print '<br><div class="line">';
                                print'<p>Engine 3:</p>';
                                print'<span>'.$data['engine3'].'</span>';
                                print'</div>';
                                print '<br><div class="line">';
                                print'<p>Engine 4:</p>';
                                print'<span>'.$data['engine4'].'</span>';
                                print'</div>';
                                print '<br><div class="line">';
                                print'<p>Engine 5:</p>';
                                print'<span>'.$data['engine5'].'</span>';
                                print'</div>';
                                print '<br><div class="line">';
                                print'<p>Engine 6:</p>';
                                print'<span>'.$data['engine6'].'</span>';
                                print'</div>';
                                print'</div>';
                            }
                            $count=$count+1;
                        }
                    }
                }
            ?>

        </div>
        <div class="footer"></div>

        <script>
            const slider = document.querySelector("#slider1");
            const value = document.querySelector("#value1");

            value.textContent = slider.value;
            slider.oninput = function(){
                value.textContent = this.value;
            }

            const slider2 = document.querySelector("#slider2");
            const value2 = document.querySelector("#value2");

            value.textContent = slider2.value;
            slider2.oninput = function(){
                value2.textContent = this.value;
            }

            const slider3 = document.querySelector("#slider3");
            const value3 = document.querySelector("#value3");

            value3.textContent = slider3.value;
            slider3.oninput = function(){
                value3.textContent = this.value;
            }

            const slider4 = document.querySelector("#slider4");
            const value4 = document.querySelector("#value4");

            value4.textContent = slider4.value;
            slider4.oninput = function(){
                value4.textContent = this.value;
            }

            const slider5 = document.querySelector("#slider5");
            const value5 = document.querySelector("#value5");

            value5.textContent = slider5.value;
            slider5.oninput = function(){
                value5.textContent = this.value;
            }

            const slider6 = document.querySelector("#slider6");
            const value6 = document.querySelector("#value6");

            value6.textContent = slider6.value;
            slider6.oninput = function(){
                value6.textContent = this.value;
            }
        </script>

    </body>
</html>