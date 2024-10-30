<?php

if (isset($_POST['action']) && $_POST['action'] == 'update')
{
	unset($_POST['action']);
	$cryptographp->update_settings($_POST);
	include (dirname(__FILE__).'/crypt/cryptographp.cfg.php');
}

?>
<div class="wrap">
<h2>Cryptographp Options</h2>
<p>Cryptographp is a PHP library to create captchas. Activating this plugin create a captcha each
time a user want to post a comment. Edit your comment template and insert <code>&lt;?php display_cryptographp(); ?&gt;</code>
anywhere you want to display the captcha.</p>

<form name="cryptoptions" method="post" >
<input type="hidden" name="action" value="update" />
<fieldset class="options">
<table width="100%" cellspacing="2" cellpadding="5" class="editform">
	<tr>
		<th width="33%" valign="top" scope="row">Cryptogram size (width/height): </th>
		<td>
			<input name="cryptwidth" type="text" id="cryptwidth" value="<?php echo $cryptwidth; ?>" size="2" />
			<input name="cryptheight" type="text" id="cryptheight" value="<?php echo $cryptheight; ?>" size="2" />
			<br/><code>Default: 130/40</code>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Background color (R/G/B): </th>
		<td>
			<input name="bgr" type="text" id="bgr" value="<?php echo $bgR; ?>" size="2" />
			<input name="bgg" type="text" id="bgg" value="<?php echo $bgG; ?>" size="2" />
			<input name="bgb" type="text" id="bgb" value="<?php echo $bgB; ?>" size="2" />
			<br/><code>Default: 255/255/255</code>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Background image: </th>
		<td>
			<input name="bgimg" type="text" id="bgimg" value="<?php echo $bgimg; ?>" size="30" />
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Color options: </th>
		<td>
			<input name="bgclear" type="checkbox" id="bgclear" <?php echo ($bgclear?'checked="checked"':''); ?> /> Transparent (PNG only)
			<br/><input name="bgframe" type="checkbox" id="bgframe" <?php echo ($bgframe?'checked="checked"':''); ?> /> Image border
			<br/><input name="charcolorrnd" type="checkbox" id="charcolorrnd" <?php echo ($charcolorrnd?'checked="checked"':''); ?> /> Random text color
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Font color (R/G/B): </th>
		<td>
			<input name="charR" type="text" id="charR" value="<?php echo $charR; ?>" size="2" />
			<input name="charG" type="text" id="charG" value="<?php echo $charG; ?>" size="2" />
			<input name="charB" type="text" id="charB" value="<?php echo $charB; ?>" size="2" />
			<br/><code>Default: 0/0/0</code>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Character brightness: </th>
		<td>
			<select name="charcolorrndlevel" id="charcolorrndlevel">
				<option value="0" <?php echo ($charcolorrndlevel==0?'selected="selected"':''); ?>>No selection</option>
				<option value="1" <?php echo ($charcolorrndlevel==1?'selected="selected"':''); ?>>Darker</option>
				<option value="2" <?php echo ($charcolorrndlevel==2?'selected="selected"':''); ?>>Dark</option>
				<option value="3" <?php echo ($charcolorrndlevel==3?'selected="selected"':''); ?>>Bright</option>
				<option value="4" <?php echo ($charcolorrndlevel==4?'selected="selected"':''); ?>>Brighter</option>
			</select>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Character transparency (0-127): </th>
		<td>
			<input name="charclear" type="text" id="charclear" value="<?php echo $charclear; ?>" size="2" />
			<br/><code>Default: 10</code>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Fonts: </th>
		<td>
			<input name="tfont" type="text" id="tfont" value="<?php echo implode(',',$tfont); ?>" size="60" />
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Characters to use: </th>
		<td>
			<input name="charel" type="text" id="charel" value="<?php echo $charel; ?>" size="40" />
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Consonants to use: </th>
		<td>
			<input name="charelc" type="text" id="charelc" value="<?php echo $charelc; ?>" size="40" />
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Vowels to use: </th>
		<td>
			<input name="charelv" type="text" id="charelv" value="<?php echo $charelv; ?>" size="40" />
		</td>
	</tr>

	<tr>
		<th width="33%" valign="top" scope="row">Text size (min/max): </th>
		<td>
			<input name="charnbmin" type="text" id="charnbmin" value="<?php echo $charnbmin; ?>" size="2" />
			<input name="charnbmax" type="text" id="charnbmax" value="<?php echo $charnbmax; ?>" size="2" />
			<br/><code>Default: 4/4</code>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Character spacing: </th>
		<td>
			<input name="charspace" type="text" id="charspace" value="<?php echo $charspace; ?>" size="2" />
			<br/><code>Default: 20</code>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Font size (min/max): </th>
		<td>
			<input name="charsizemin" type="text" id="charsizemin" value="<?php echo $charsizemin; ?>" size="2" />
			<input name="charsizemax" type="text" id="charsizemax" value="<?php echo $charsizemax; ?>" size="2" />
			<br/><code>Default: 14/16</code>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Character max angle: </th>
		<td>
			<input name="charanglemax" type="text" id="charanglemax" value="<?php echo $charanglemax; ?>" size="2" />
			<br/><code>Default: 20</code>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Random pixels (min/max): </th>
		<td>
			<input name="noisepxmin" type="text" id="noisepxmin" value="<?php echo $noisepxmin; ?>" size="2" />
			<input name="noisepxmax" type="text" id="noisepxmax" value="<?php echo $noisepxmax; ?>" size="2" />
			<br/><code>Default: 10/10</code>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Random lines (min/max): </th>
		<td>
			<input name="noiselinemin" type="text" id="noiselinemin" value="<?php echo $noiselinemin; ?>" size="2" />
			<input name="noiselinemax" type="text" id="noiselinemax" value="<?php echo $noiselinemax; ?>" size="2" />
			<br/><code>Default: 1/1</code>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Random circles (min/max): </th>
		<td>
			<input name="nbcirclemin" type="text" id="nbcirclemin" value="<?php echo $nbcirclemin; ?>" size="2" />
			<input name="nbcirclemax" type="text" id="nbcirclemax" value="<?php echo $nbcirclemax; ?>" size="2" />
			<br/><code>Default: 1/1</code>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Noise color: </th>
		<td>
			<select name="noisecolorchar" id="noisecolorchar">
				<option value="1" <?php echo ($noisecolorchar==1?'selected="selected"':''); ?>>Same as text</option>
				<option value="2" <?php echo ($noisecolorchar==2?'selected="selected"':''); ?>>Same as background</option>
				<option value="3" <?php echo ($noisecolorchar==3?'selected="selected"':''); ?>>Random</option>
			</select>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Brush size (1-25): </th>
		<td>
			<input name="brushsize" type="text" id="brushsize" value="<?php echo $brushsize; ?>" size="2" />
			<br/><code>Default: 1</code>
		</td>
	</tr>
	
	<tr>
		<th width="33%" valign="top" scope="row">More options: </th>
		<td>
			<input name="crypteasy" type="checkbox" id="crypteasy" <?php echo ($crypteasy?'checked="checked"':''); ?> /> Easy readable text
			<br/><input name="difuplow" type="checkbox" id="difuplow" <?php echo ($difuplow?'checked="checked"':''); ?> /> Differenciate capitals
			<br/><input name="charup" type="checkbox" id="charup" <?php echo ($charup?'checked="checked"':''); ?> /> Random vertical move
			<br/><input name="cryptgaussianblur" type="checkbox" id="cryptgaussianblur" <?php echo ($cryptgaussianblur?'checked="checked"':''); ?> /> Gaussian blur
			<br/><input name="cryptgrayscal" type="checkbox" id="cryptgrayscal" <?php echo ($cryptgrayscal?'checked="checked"':''); ?> /> Grayscale
			<br/><input name="noiseup" type="checkbox" id="noiseup" <?php echo ($noiseup?'checked="checked"':''); ?> /> Noise on top
			<br/><input name="logenable" type="checkbox" id="logenable" <?php echo ($logenable?'checked="checked"':''); ?> /> Enable for logged in users
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">File format: </th>
		<td>
			<select name="cryptformat" id="cryptformat">
				<option value="png" <?php echo ($cryptformat=='png'?'selected="selected"':''); ?>>PNG</option>
				<option value="gif" <?php echo ($cryptformat=='gif'?'selected="selected"':''); ?>>GIF</option>
				<option value="jpg" <?php echo ($cryptformat=='jpg'?'selected="selected"':''); ?>>JPEG</option>
			</select>
		</td>
	</tr>
	<tr>
		<th width="33%" valign="top" scope="row">Hash method: </th>
		<td>
			<select name="cryptsecure" id="cryptsecure">
				<option value="md5" <?php echo ($cryptsecure=='md5'?'selected="selected"':''); ?>>MD5</option>
				<option value="sha1" <?php echo ($cryptsecure=='sha1'?'selected="selected"':''); ?>>SHA1</option>
				<option value="" <?php echo ($cryptsecure==''?'selected="selected"':''); ?>>None</option>
			</select>
		</td>
	</tr>
</table>
</fieldset>
<p class="submit"><input type="submit" name="Submit" value="Update Options &raquo;" /></p>
</form>
</div>