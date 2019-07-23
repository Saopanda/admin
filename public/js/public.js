// tab 切换
function tabChange() {
    for (var i = 0; i < iconChange.length; i++) {
        iconChange[i].index = i;
        iconChange[i].onclick = function () {
            for (var j = 0; j < iconChange.length; j++) {
                iconChange[j].className = 'iconChange';
            }
            iconChange[this.index].className = 'iconChange iconBg';
            // console.log(iconChange[this.index].firstElementChild.src)
        }
    }

}