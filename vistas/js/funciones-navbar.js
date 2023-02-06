(function($) { 
    $(function() { 
  
      //  open and close nav 
      $('#navbar-toggle').click(function() {
        $('nav ul').slideToggle();
      });
  
  
      // Hamburger toggle
      $('#navbar-toggle').on('click', function() {
        this.classList.toggle('active');
      });
  
  
      // If a link has a dropdown, add sub menu toggle.
      $('nav ul li a:not(:only-child)').click(function(e) {
        $(this).siblings('.navbar-dropdown').slideToggle("slow");
  
        // Close dropdown when select another dropdown
        $('.navbar-dropdown').not($(this).siblings()).hide("slow");
        e.stopPropagation();
      });
  
  
      // Click outside the dropdown will remove the dropdown class
      $('html').click(function() {
        $('.navbar-dropdown').hide();
      });
    }); 
  })(jQuery); 


  document.addEventListener('DOMContentLoaded', function() {
    applyInputMask('dni', '0000-0000-00000');
  });


  function applyInputMask(elementId, mask) {
    let inputElement = document.getElementById(elementId);
    let content = '';
    let maxChars = numberCharactersPattern(mask);
    
    inputElement.addEventListener('keydown', function(e) {
      e.preventDefault();
      if (isNumeric(e.key) && content.length < maxChars) {
        content += e.key;
      }
      if(e.keyCode == 8) {
        if(content.length > 0) {
          content = content.subst(0, content.length - 1);
        }
      }
      inputElement.value = maskIt('0000-0000-00000', content);
    })
  }