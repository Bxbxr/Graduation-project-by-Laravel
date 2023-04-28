$(document).ready(function() {
    // Get a reference to the type select box
    var typeSelect = $("#type");

    // Get a reference to the university select box
    var universitySelect = $("#university-list");

    // Bind an event handler to the change event of the type select box
    typeSelect.change(function() {
        if ($(this).val() === "university") {
            universitySelect.show();
        } else {
            universitySelect.hide();
        }
    });

    // Bind an event handler to the change event of the university select box
    universitySelect.change(function() {
        // Get the selected university's ID
        var universityId = $(this).val();

        // Store the university ID in a variable
        var selectedUniversityId = universityId;

        // You can use the variable selectedUniversityId in your form submission code
    });
});
