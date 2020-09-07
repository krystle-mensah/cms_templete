// query once the page has loaded
$(document).ready(function () {

	//EDITOR CKEDITOR		
	ClassicEditor
	.create(document.querySelector('#body'))
	.catch(error => {
		console.error(error);
	});

	
	// we select the box and add an event on it when clicked
	$('#selectAllBoxes').click(function(event) {

		// if this.#selectAllBoxes box is checked
		if(this.checked) {

			// grap all the checked boxes and for each of them run a function
			$('.checkBoxes').each(function() {
				
				//click this box and this.checkBoxes equal ture.				
				this.checked = true;
			
			});

			// else it is not true the check box should equal false and the box well be clear
		} else {

			$('.checkBoxes').each(function() {
				
				this.checked = false;
			
			});

		}// if statment

	});// event

});//document