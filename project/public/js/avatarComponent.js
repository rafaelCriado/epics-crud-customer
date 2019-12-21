const form = document.getElementById("form-change-avatar");
const inputAvatar = document.getElementById("avatar");
const btnAlterar = document.getElementById("btnAlterarAvatar");

btnAlterar.addEventListener("click", function(e) {
    e.preventDefault();
    inputAvatar.click();
});

inputAvatar.addEventListener("change", function() {
    form.submit();
});
