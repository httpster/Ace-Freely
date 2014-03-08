var AceFreely = {

	init: function(inputId, theme, useTabs, tabSize)
	{

		// Set input variable and hide it
		var input  = $("#" + inputId);
		input.hide();

		// Initialize Ace Editor
		var editor = ace.edit(inputId + "Container");

		// Configure Ace Editor
		editor.setTheme("ace/theme/" + theme);
		editor.getSession().setMode("ace/mode/twig");
		editor.setShowInvisibles(true);

		// Are we using tabs? If so set the tab size
		if (useTabs === 1) {
			editor.getSession().setUseSoftTabs(false);
			editor.getSession().setTabSize(tabSize);
		}

		// Update Ace Editor with content from input
		editor.getSession().setValue(input.val());

		// Update input with content from Ace Editor
		editor.getSession().on('change', function(){
			input.val( editor.getSession().getValue() )
		});

	}

};
