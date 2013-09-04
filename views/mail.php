<button id="lg"><a href="index.php?controllers=home">LOG OUT</a></button>
<button id="goback"><a href="index.php?controllers=grades&action=grades">BACK</a></button>
<div id="form-container">
    <fieldset id="mail">
    	<form method='post' action='?controllers=mail&action=send' enctype="multipart/form-data">
     		<label for="email">Email :</label>
            <input name="email" type='text' value="<? echo $data ?>" /><br>
            
            <label for="subject">Subject :</label>
            <input name="subject" type='text' /><br>
            
            <label for="message">Message :</label></br>
            <textarea name="message" rows='15' cols='40' />
            </textarea><br>
            
            <input type='submit'>
   	 </form>
   </fieldset>
</div>