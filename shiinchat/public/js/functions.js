// comment functionality
const showMoreBtn = document.getElementById('show-more-comments-btn');
        const showLessBtn = document.getElementById('show-less-comments-btn');
        var comments = document.getElementsByClassName('comment');

        if(comments.length == 0){
            showMoreBtn.style.display = 'none';
        }

        showMoreBtn.addEventListener('click', function() {
            for (var i = 0; i < comments.length; i++) {
                comments[i].classList.add('show');
            }
            showMoreBtn.style.display = 'none';
            showLessBtn.style.display = 'inline-block';
        });

        showLessBtn.addEventListener('click', function() {
            for (var i = 3; i < comments.length; i++) {
                comments[i].classList.remove('show');
            }
            showMoreBtn.style.display = 'inline-block';
            showLessBtn.style.display = 'none';
        });
        showLessBtn.style.display = 'none';
        showMoreBtn.parentNode.insertBefore(showLessBtn, showMoreBtn.nextSibling);
