<h1 id="addaStudent">Add a Student</h1>
<form method="post" action="?controllers=students&action=add" enctype="multipart/form-data">
	<fieldset id="stuAdd">
    	<label for="firstname">First Name :</label>
        <input type="text" name="firstname" class="grading"/>
        <label for="lastname">Last Name :</label>
        <input type="text" name="lastname" class="grading"/>
        <label for="email">Email :</label>
        <input type="text" name="email" class="grading"/>
        <input type="submit" alt="add button" value="ADD"/>
    </fieldset>
</form>
<table class="" width="800">
	<thead>
		<tr bgcolor="#CCCCCC">
            <th id="student" class='sortcol'>Student</th>
            <th id="lab1" class='sortcol'>Lab1</th>
            <th id="lab2" class='sortcol'>Lab2</th>
            <th id="lab3" class='sortcol'>Lab3</th>
            <th id="lab4" class='sortcol'>Lab4</th>
            <th id="lab5" class='sortcol'>Lab5</th>
            <th id="lab6" class='sortcol'>Lab6</th>
            <th id="lab7" class='sortcol'>Lab7</th>
            <th id="lab8" class='sortcol'>Lab8</th>
            <th id="lab9" class='sortcol'>Lab9</th>
            <th id="lab10" class='sortcol'>Lab10</th>
            <th id="quiz1" class='sortcol'>Quiz1</th>
            <th id="quiz2" class='sortcol'>Quiz2</th>
            <th id="quiz3" class='sortcol'>Quiz3</th>
            <th id="quiz4" class='sortcol'>Quiz4</th>
            <th id="midterm" class='sortcol'>Midterm</th>
            <th id="final" class='sortcol'>Final</th>
            <th id="grade" class='sortcol'>Grade</th>
    	</tr>
	</thead>
	<tbody>
    <? foreach($data as $d){?>
    <form method="post" action="?controllers=grades&action=update" enctype="multipart/form-data">
		<tr class='roweven'>
        	<td><? echo $d["student"]; ?><input type="hidden" name="studentID" value="<? echo $d["studentID"]; ?>">
            <input type="hidden" name="teacherID" value="<? echo $d["teacherID"]; ?>"></td>
            <td><input type="number" name="lab1" value="<? echo $d["lab1"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="lab2" value="<? echo $d["lab2"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="lab3" value="<? echo $d["lab3"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="lab4" value="<? echo $d["lab4"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="lab5" value="<? echo $d["lab5"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="lab6" value="<? echo $d["lab6"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="lab7" value="<? echo $d["lab7"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="lab8" value="<? echo $d["lab8"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="lab9" value="<? echo $d["lab9"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="lab10" value="<? echo $d["lab10"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="quiz1" value="<? echo $d["quiz1"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="quiz2" value="<? echo $d["quiz2"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="quiz3" value="<? echo $d["quiz3"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="quiz4" value="<? echo $d["quiz4"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="midterm" value="<? echo $d["midterm"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><input type="number" name="final" value="<? echo $d["final"]; ?>" max="100" min="0" style="width:35px" /></td>
            <td><? echo $d["finalGrade"]; ?></td>
            <td><button><a href="?controllers=students&action=delete&studentID=<? echo $d["studentID"]; ?>&gradeID=<? echo $d["id"]; ?>">DELETE</a></button></td>
            <td><button id="save"><a href="index.php?controllers=grades&action=grades">SAVE</a></button></td>
            <td><input type="submit" alt="submit button" value="UPDATE" /></td>
        </tr>
    </form>
    <? }?>
	</tbody>
</table>