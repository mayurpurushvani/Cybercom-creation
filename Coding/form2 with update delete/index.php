<head>
    <title>Form 2</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="background">
        <form action="insert.php" method="POST" id="form" name="form">

            <fieldset>

                <legend>USER FORM</legend>

                <table>
                    <tr>
                        <td><i class="fa fa-circle" aria-hidden="true"></i>First Name</td>
                        <td> <input class="input" type="text" name="fname" /> </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-circle" aria-hidden="true"></i>Password</td>
                        <td> <input class="input" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /> </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-circle" aria-hidden="true"></i>Gender</td>
                        <td> <input type="radio" value="male" name="gender">Male &nbsp;&nbsp;&nbsp; <input type="radio" value="female" name="gender">Female </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-circle" aria-hidden="true"></i>Address</td>
                        <td><textarea name="address" rows="3" cols="20"></textarea> </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-circle" aria-hidden="true"></i>D.O.B</td>
                        <td>
                            <select id="month" name="month">
                                <option value=0>Month</option>
                                <option value=1>January</option>
                                <option value="2">February</option>
                                <option value=3>March</option>
                                <option value=4>April</option>
                                <option value=5>May</option>
                                <option value=6>June</option>
                                <option value=7>July</option>
                                <option value=8>August</option>
                                <option value=9>september</option>
                                <option value=10>october</option>
                                <option value=11>november</option>
                                <option value=12>december</option>
                            </select>
                            &nbsp;
                            <select id="date" name="date">
                                <option value=0>Date</option>
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                                <option value=5>5</option>
                                <option value=6>6</option>
                                <option value=7>7</option>
                                <option value=8>8</option>
                                <option value=9>9</option>
                                <option value=10>10</option>
                                <option value=11>11</option>
                                <option value=12>12</option>
                                <option value=13>13</option>
                                <option value=14>14</option>
                                <option value=15>15</option>
                                <option value=16>16</option>
                                <option value=17>17</option>
                                <option value=18>18</option>
                                <option value=19>19</option>
                                <option value=20>20</option>
                                <option value=21>21</option>
                                <option value=22>22</option>
                                <option value=23>23</option>
                                <option value=24>24</option>
                                <option value=25>25</option>
                                <option value=26>26</option>
                                <option value=27>27</option>
                                <option value=28>28</option>
                                <option value=29>29</option>
                                <option value=30>30</option>
                                <option value=31>31</option>

                            </select>
                            &nbsp;
                            <select id="year" name="year">
                                <option value=0>Year</option>
                                <option value=1990>1990</option>
                                <option value=1991>1991</option>
                                <option value=1992>1992</option>
                                <option value=1993>1993</option>
                                <option value=1994>1994</option>
                                <option value=1995>1995</option>
                                <option value=1996>1996</option>
                                <option value=1997>1997</option>
                                <option value=1998>1998</option>
                                <option value=1999>1999</option>
                                <option value=2000>2000</option>
                                <option value=2001>2001</option>
                                <option value=2002>2002</option>
                                <option value=2003>2003</option>
                                <option value=2004>2004</option>
                                <option value=2005>2005</option>
                                <option value=2006>2006</option>
                                <option value=2007>2007</option>
                                <option value=2008>2008</option>
                                <option value=2009>2009</option>
                                <option value=2010>2010</option>
                                <option value=2011>2011</option>
                                <option value=2012>2012</option>
                                <option value=2013>2013</option>
                                <option value=2014>2014</option>
                                <option value=2015>2015</option>
                                <option value=2016>2016</option>
                                <option value=2017>2017</option>
                                <option value=2018>2018</option>
                                <option value=2019>2019</option>
                                <option value=2020>2020</option>
                                <option value=2021>2021</option>

                            </select>

                        </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-circle" aria-hidden="true"></i>Select Games</td>
                        <td>
                            <input type="checkbox" name="game[]" value="hockey"> Hockey
                            <input type="checkbox" name="game[]" value="football"> Football
                            <input type="checkbox" name="game[]" value="cricket"> Cricket
                            <input type="checkbox" name="game[]" value="vollyball"> Vollyball
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-circle" aria-hidden="true"></i>Merital Status </td>
                        <td>
                            <input type="radio" name="marital" value="married">Married
                            <input type="radio" name="marital" value="unmarried">Unmarried
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" disabled="disabled" id="submit" value="Submit">
                            <input type="reset" name="reset" value="Reset">
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="checkbox" name="terms" onchange="document.getElementById('submit').disabled = !this.checked;">I accept this agrement
                        </td>
                    </tr>
                </table>
            </fieldset>


        </form>

    </div>


    <table border="1" name="table" class="table">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>password</th>
            <th>gender</th>
            <th>address</th>
            <th>D.O.B</th>
            <th>game</th>
            <th>Marital Status</th>
            <th></th>
            <th></th>
        </tr>


        <?php
        require('connect.php');
        /*RETRIVE DATA REGION*/

        $query = "SELECT `id`,`fname`,`password`,`gender`,`address`,`dob`,`games`,`marital` from `form2`";
        if ($query_run = mysqli_query($con, $query)) {
            if (mysqli_num_rows($query_run) == NULL) {
                echo '<script> alert ("No result found!")</script>';
            } else {
                while ($query_row = mysqli_fetch_assoc($query_run)) {
                    $id = $query_row['id'];
                    $fname = $query_row['fname'];
                    $password = $query_row['password'];
                    $gender = $query_row['gender'];
                    $address = $query_row['address'];
                    $dob = $query_row['dob'];
                    $games = $query_row['games'];
                    $marital = $query_row['marital'];

        ?>
                    <tr id="tr" class="del<?php echo $id; ?>">

                        <?php
                        echo ("<td class='td'>$id</td>");
                        echo ("<td class='td'>$fname</td>");
                        echo ("<td class='td'>$password</td>");
                        echo ("<td class='td'>$gender</td>");
                        echo ("<td class='td'>$address</td>");
                        echo ("<td class='td'>$dob</td>");
                        echo ("<td class='td'>$games</td>");
                        echo ("<td class='td'>$marital</td>");
                        ?>
                        <td class="td">
                            <form action="update.php" method="post">
                                <input type="text" style="display:none;" name="type" value="update">
                                <input type="text" style="display:none;" name="id" value="<?php echo $id; ?>">
                                <input type="text" style="display:none;" name="fname" value="<?php echo $fname ?>">
                                <input type="text" style="display:none;" name="password" value="<?php echo $password ?>">
                                <input type="text" style="display:none;" name="gender" value="<?php echo $gender ?>">
                                <input type="text" style="display:none;" name="address" value="<?php echo $address ?>">
                                <input type="text" style="display:none;" name="dob" value="<?php echo $dob ?>">
                                <input type="text" style="display:none;" name="games" value="<?php echo $games ?>">
                                <input type="text" style="display:none;" name="marital" value="<?php echo $marital ?>">
                                <div>
                                    <input type="submit" value="UPDATE" class="updatebtn">
                                    </button>
                                </div>
                            </form>
                        </td>
            <?php
                    echo ("<td class='td'><div><a href='#' class='delete' data-id='" . $id . "'>DELETE</a></div></td>");
                    echo ("</tr>");
                }
            }
        } else {
            echo mysqli_error('Error!');
        }
        /*RETRIVE DATA REGION OVER*/
            ?>

    </table>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>