$('select option')
    .filter(function() {
        return !this.value || $.trim(this.value).length == 0 || $.trim(this.text).length == 0;
    })
   .remove();