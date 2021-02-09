<?php

$type = $_POST['type'];
$id = $_POST['id'];
$fname = $_POST['fname'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$games = $_POST['games'];
$marital = $_POST['marital'];
$n = explode(',', $games);

$c = explode('-', $dob);
$year = $c[0];
$month = $c[1];
$date = $c[2];

?>

<head>
    <title>Update</title>
    <link rel="stylesheet" href="style.css" />
</head>

<div class="background">
    <form action="update_db.php" method="POST" id="form" name="form">

        <fieldset>

            <legend>USER FORM</legend>

            <table>
                <tr>
                    <td><i class="fa fa-circle" aria-hidden="true"></i>First Name</td>
                    <td> <input class="input" type="text" name="fname" value="<?php echo $fname ?>" /> </td>
                </tr>

                <tr>
                    <td><i class="fa fa-circle" aria-hidden="true"></i>Password</td>
                    <td> <input class="input" type="password" name="password" value="<?php echo $password ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /> </td>
                </tr>

                <tr>
                    <td><i class="fa fa-circle" aria-hidden="true"></i>Gender</td>
                    <td> <input type="radio" name="gender" value="male" <?php echo ($gender == 'male') ? 'checked' : ''; ?> /> Male &nbsp;&nbsp;&nbsp; <input type="radio" value="female" <?php echo ($gender == 'female') ? 'checked' : ''; ?> name="gender">Female </td>
                </tr>

                <tr>
                    <td><i class="fa fa-circle" aria-hidden="true"></i>Address</td>
                    <td><textarea name="address" rows="3" cols="20"><?php echo $address; ?></textarea> </td>
                </tr>

                <tr>
                    <td><i class="fa fa-circle" aria-hidden="true"></i>D.O.B</td>
                    <td>
                        <select id="month" name="month">
                            <option value=0>Month</option>
                            <option value=1 <?php if ($month == "1") {echo "selected";}?> >January</option>
                            <option value=2 <?php if ($month == "2") {echo "selected";}?> >February</option>
                            <option value=3 <?php if ($month == "3") {echo "selected";}?>>March</option>
                            <option value=4 <?php if ($month == "4") {echo "selected";}?>>April</option>
                            <option value=5 <?php if ($month == "5") {echo "selected";}?>>May</option>
                            <option value=6 <?php if ($month == "6") {echo "selected";}?>>June</option>
                            <option value=7 <?php if ($month == "7") {echo "selected";}?>>July</option>
                            <option value=8 <?php if ($month == "8") {echo "selected";}?>>August</option>
                            <option value=9 <?php if ($month == "9") {echo "selected";}?>>september</option>
                            <option value=10 <?php if ($month == "10") {echo "selected";}?>>october</option>
                            <option value=11 <?php if ($month == "11") {echo "selected";}?>>november</option>
                            <option value=12 <?php if ($month == "12") {echo "selected";}?>>december</option>
                        </select>
                        &nbsp;
                        <select id="date" name="date">
                            <option value=0>Date</option>
                            <option value=1 <?php if ($date == "1") {echo "selected";}?>>1</option>
                            <option value=2 <?php if ($date == "2") {echo "selected";}?>>2</option>
                            <option value=3 <?php if ($date == "3") {echo "selected";}?>>3</option>
                            <option value=4 <?php if ($date == "4") {echo "selected";}?>>4</option>
                            <option value=5 <?php if ($date == "5") {echo "selected";}?>>5</option>
                            <option value=6 <?php if ($date == "6") {echo "selected";}?>>6</option>
                            <option value=7 <?php if ($date == "7") {echo "selected";}?>>7</option>
                            <option value=8 <?php if ($date == "8") {echo "selected";}?>>8</option>
                            <option value=9 <?php if ($date == "9") {echo "selected";}?>>9</option>
                            <option value=10 <?php if ($date == "10") {echo "selected";}?>>10</option>
                            <option value=11 <?php if ($date == "11") {echo "selected";}?>>11</option>
                            <option value=12 <?php if ($date == "12") {echo "selected";}?>>12</option>
                            <option value=13 <?php if ($date == "13") {echo "selected";}?>>13</option>
                            <option value=14 <?php if ($date == "14") {echo "selected";}?>>14</option>
                            <option value=15 <?php if ($date == "15") {echo "selected";}?>>15</option>
                            <option value=16 <?php if ($date == "16") {echo "selected";}?>>16</option>
                            <option value=17 <?php if ($date == "17") {echo "selected";}?>>17</option>
                            <option value=18 <?php if ($date == "18") {echo "selected";}?>>18</option>
                            <option value=19 <?php if ($date == "19") {echo "selected";}?>>19</option>
                            <option value=20 <?php if ($date == "10") {echo "selected";}?>>20</option>
                            <option value=21 <?php if ($date == "21") {echo "selected";}?>>21</option>
                            <option value=22 <?php if ($date == "22") {echo "selected";}?>>22</option>
                            <option value=23 <?php if ($date == "23") {echo "selected";}?>>23</option>
                            <option value=24 <?php if ($date == "24") {echo "selected";}?>>24</option>
                            <option value=25 <?php if ($date == "25") {echo "selected";}?>>25</option>
                            <option value=26 <?php if ($date == "26") {echo "selected";}?>>26</option>
                            <option value=27 <?php if ($date == "27") {echo "selected";}?>>27</option>
                            <option value=28 <?php if ($date == "28") {echo "selected";}?>>28</option>
                            <option value=29 <?php if ($date == "29") {echo "selected";}?>>29</option>
                            <option value=30 <?php if ($date == "30") {echo "selected";}?>>30</option>
                            <option value=31 <?php if ($date == "31") {echo "selected";}?>>31</option>
                        </select>
                        &nbsp;
                        <select id="year" name="year">
                            <option value=0>Year</option>
                            <option value=1990 <?php if ($year == "1990") {echo "selected";}?>>1990</option>
                            <option value=1991 <?php if ($year == "1991") {echo "selected";}?>>1991</option>
                            <option value=1992 <?php if ($year == "1992") {echo "selected";}?>>1992</option>
                            <option value=1993 <?php if ($year == "1993") {echo "selected";}?>>1993</option>
                            <option value=1994 <?php if ($year == "1994") {echo "selected";}?>>1994</option>
                            <option value=1995 <?php if ($year == "1995") {echo "selected";}?>>1995</option>
                            <option value=1996 <?php if ($year == "1996") {echo "selected";}?>>1996</option>
                            <option value=1997 <?php if ($year == "1997") {echo "selected";}?>>1997</option>
                            <option value=1998 <?php if ($year == "1998") {echo "selected";}?>>1998</option>
                            <option value=1999 <?php if ($year == "1999") {echo "selected";}?>>1999</option>
                            <option value=2000 <?php if ($year == "2000") {echo "selected";}?>>2000</option>
                            <option value=2001 <?php if ($year == "2001") {echo "selected";}?>>2001</option>
                            <option value=2002 <?php if ($year == "2002") {echo "selected";}?>>2002</option>
                            <option value=2003 <?php if ($year == "2003") {echo "selected";}?>>2003</option>
                            <option value=2004 <?php if ($year == "2004") {echo "selected";}?>>2004</option>
                            <option value=2005 <?php if ($year == "2005") {echo "selected";}?>>2005</option>
                            <option value=2006 <?php if ($year == "2006") {echo "selected";}?>>2006</option>
                            <option value=2007 <?php if ($year == "2007") {echo "selected";}?>>2007</option>
                            <option value=2008 <?php if ($year == "2008") {echo "selected";}?>>2008</option>
                            <option value=2009 <?php if ($year == "2009") {echo "selected";}?>>2009</option>
                            <option value=2010 <?php if ($year == "2010") {echo "selected";}?>>2010</option>
                            <option value=2011 <?php if ($year == "2011") {echo "selected";}?>>2011</option>
                            <option value=2012 <?php if ($year == "2012") {echo "selected";}?>>2012</option>
                            <option value=2013 <?php if ($year == "2013") {echo "selected";}?>>2013</option>
                            <option value=2014 <?php if ($year == "2014") {echo "selected";}?>>2014</option>
                            <option value=2015 <?php if ($year == "2015") {echo "selected";}?>>2015</option>
                            <option value=2016 <?php if ($year == "2016") {echo "selected";}?>>2016</option>
                            <option value=2017 <?php if ($year == "2017") {echo "selected";}?>>2017</option>
                            <option value=2018 <?php if ($year == "2018") {echo "selected";}?>>2018</option>
                            <option value=2019 <?php if ($year == "2019") {echo "selected";}?>>2019</option>
                            <option value=2020 <?php if ($year == "2020") {echo "selected";}?>>2020</option>
                            <option value=2021 <?php if ($year == "2021") {echo "selected";}?>>2021</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><i class="fa fa-circle" aria-hidden="true"></i>Select Games</td>
                    <td>
                        <input type="checkbox" name="game[]" value="hockey" <?php

                                                                            if (in_array("hockey", $n)) {
                                                                                echo "checked";
                                                                            }
                                                                            ?>> Hockey
                        <input type="checkbox" name="game[]" value="football" <?php

                                                                                if (in_array("football", $n)) {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>> Football
                        <input type="checkbox" name="game[]" value="cricket" <?php

                                                                                if (in_array("cricket", $n)) {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>> Cricket
                        <input type="checkbox" name="game[]" value="vollyball" <?php

                                                                                if (in_array("vollyball", $n)) {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>> Vollyball
                    </td>
                </tr>

                <tr>
                    <td><i class="fa fa-circle" aria-hidden="true"></i>Merital Status </td>
                    <td>
                        <input type="radio" name="marital" value="married" <?php echo ($marital == 'married') ? 'checked' : ''; ?>>Married
                        <input type="radio" name="marital" value="unmarried" <?php echo ($marital == 'unmarried') ? 'checked' : ''; ?>>Unmarried
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


<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>