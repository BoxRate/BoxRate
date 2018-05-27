     function selectAll(isChecked) {
      var items=document.getElementsByName('check[]');
      if (isChecked) {
        for(var i=0; i<items.length; i++){
          if(items[i].type=='checkbox')
            items[i].checked=true;
        }
      } else {
        for(var i=0; i<items.length; i++){
          if(items[i].type=='checkbox')
            items[i].checked=false;
      }
        }
    }     