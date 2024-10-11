const deleteActualite = () => {
    if (confirm("Voulez-vous vraiment supprimer cette actualité")) {

        document.getElementById('deleteForm').submit();

        formDelete.submit();
    }
}
