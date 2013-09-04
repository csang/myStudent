<button id="logoutTwo"><a href="index.php?controllers=home">LOG OUT</a></button>
<table class="sortable" width="800">
	<thead>
		<tr bgcolor="#CCCCCC">
            <th id="student" class='sortcol'>Teacher</th>
            <th id="lab1" class='sortcol'>Lab1</th>
            <th id="lab2" class='sortcol'>Lab2</th>
            <th id="lab3" class='sortcol'>Lab3</th>
            <th id="lab4" class='sortcol'>Lab4</th>
            <th id="lab5" class='sortcol'>Lab5</th>
            <th id="lab6" class='sortcol'>Lab6</th>
            <th id="lab7" class='sortcol'>Lab7</th>
            <th id="lab1" class='sortcol'>Lab8</th>
            <th id="lab2" class='sortcol'>Lab9</th>
            <th id="lab3" class='sortcol'>Lab10</th>
            <th id="lab4" class='sortcol'>Quiz1</th>
            <th id="lab5" class='sortcol'>Quiz2</th>
            <th id="lab6" class='sortcol'>Quiz3</th>
            <th id="lab7" class='sortcol'>Quiz4</th>
            <th id="lab7" class='sortcol'>Midterm</th>
            <th id="lab7" class='sortcol'>Final</th>
    	</tr>
	</thead>
	<tbody>
    <? foreach($data as $d){?>
		<tr class='roweven'>
        	<td><? echo $d["teacher"]; ?></td>
            <td><? echo $d["lab1"]; ?></td>
            <td><? echo $d["lab2"]; ?></td>
            <td><? echo $d["lab3"]; ?></td>
            <td><? echo $d["lab4"]; ?></td>
            <td><? echo $d["lab5"]; ?></td>
            <td><? echo $d["lab6"]; ?></td>
            <td><? echo $d["lab7"]; ?></td>
            <td><? echo $d["lab8"]; ?></td>
            <td><? echo $d["lab9"]; ?></td>
            <td><? echo $d["lab10"]; ?></td>
            <td><? echo $d["quiz1"]; ?></td>
            <td><? echo $d["quiz2"]; ?></td>
            <td><? echo $d["quiz3"]; ?></td>
            <td><? echo $d["quiz4"]; ?></td>
            <td><? echo $d["midterm"]; ?></td>
            <td><? echo $d["final"]; ?></td>
        </tr>
    <? }?>
	</tbody>
</table>
