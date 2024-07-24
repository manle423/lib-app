<footer>
    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="copyright">
                        <div class="row">

                            <div class="col-md-6">
                                <p>© 2022 All rights reserved. Free HTML Template by <a
                                        href="https://www.templatesjungle.com/" target="_blank">TemplatesJungle</a>
                                </p>
                            </div>

                            <div class="col-md-6">
                                <div class="social-links align-right">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon icon-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-youtube-play"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-behance-square"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div><!--grid-->

                </div><!--footer-bottom-content-->
            </div>
        </div>
    </div>
</footer>
<script>
    $(document).ready(function() {
        $('#search-input').on('keyup', function() {
            let query = $(this).val();

            if (query.length < 3) {
                $('#search-results').html(''); // Clear results if query is too short
                return;
            }

            $.ajax({
                url: '{{ route('search') }}',
                method: 'GET',
                data: {
                    query: query
                },
                success: function(data) {
                    if (data.length === 0) {
                        $('#search-results').html('<p>No results found</p>');
                    } else {
                        let results = data.map(book => `
                            <div class="search-result-item">
                                <h3>${book.title}</h3>
                                <p><strong>Author:</strong> ${book.author ? book.author.name : 'Unknown Author'}</p>
                                <p><strong>Publisher:</strong> ${book.publisher ? book.publisher.name : 'Unknown Publisher'}</p>
                            </div>
                        `).join('');
                        $('#search-results').html(results);
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                    $('#search-results').html('<p>An error occurred</p>');
                }
            });
        });
    });
</script>

<script src="{{ asset('users/js/jquery-1.11.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<script src="{{ asset('users/js/plugins.js') }}"></script>
<script src="{{ asset('users/js/script.js') }}"></script>

</body>

</html>
