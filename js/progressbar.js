/**
 * ProgressBar for jQuery
 *
 * @version 1 (29. Dec 2012)
 * @author Ivan Lazarevic
 * @requires jQuery
 * @see http://workshop.rs
 *
 * @param  {Number} percent
 * @param  {Number} $element progressBar DOM element
 */
function progressbar(percent, $element) {
	var progressbarwidth = percent * $element.width() / 100;
	$element.find('div').animate({ width: progressbarwidth }, 500).html(percent + "%&nbsp;");
}
