console.log("Bootstrap-maxlength running")

$('.textarea-maxlength').maxlength({
    threshold: 0,
    alwaysShow: true,
    preText: "Max characters: ",
    validate: true,
    placement: "bottom-right-inside",
    warningClass: "form-label-lower", 
    limitReachedClass: "form-label-lower"
});