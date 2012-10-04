Drupal.behaviors.mykaveretjs = function (context) {
// find user images from our specific view and block, and act on them only
     $('.view-display-id-block_3').find('.imagecache-user_picture_meta').mouseover(function()
      {

         
    	 // get href, alt and title from parent & img
    	 href=$(this).parent().attr("href");
         title=$(this).parent().attr("title");
         alt=$(this).attr("alt");
         if (alt.indexOf("התמונה של ") > -1 ) {
        	 alt = alt.substring(10);
         }
         //optionally set cursor
         //$(this).css("cursor","pointer");
         
         // duplicate img to allow zoom
         new_img = $(this).clone();

         // add design to zoomed img
         new_img.removeClass('kav-group-block-members-zoom').addClass('kav-group-block-members-zoom-img');
         new_img.css("width", "100px");
         new_img.css("height", "100px");
         new_img.css("border-color", "white"); // hardcoded since other script interferes
         
         // new div for img caption + design
         new_div=$('<div class="kav-group-block-members-zoom-name">'+alt+'</div>');
         
         // outside div with position absolute so table design would not be damaged
         img_with_caption_div=$('<div class="kav-group-block-members-zoom-img-with-caption"/>');
         img_with_caption_div.append(new_img).append(new_div);
         img_with_caption_div.addClass('kav-group-block-members-zoom-processed');
         
         // now add to page
         $(this).parent().parent().append(img_with_caption_div);
      });

     // remove the additions as we mouse out
     $('.view-display-id-block_3').find('.imagecache-user_picture_meta').mouseout(function()       
      {   
         $('.kav-group-block-members-zoom-processed').remove();
      });
      
}