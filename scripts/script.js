document.querySelector("#searchInput").onkeydown = function(e){
    if (e.keyCode == 13){
        window.location = 'index.php?page=search&keyword=' + this.value;
    }
};