<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url() ?>pengguna/css/pdf.css" />
    <title>Perpustakaan IAI Al-Khairat</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('admin/build/images/book.png') ?>" />
</head>

<body>
    <div class="top-bar" style="width: 100%">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="col-md-6 col-xs-12">
                    <button class="btn" id="prev-page">
                        <i class="fas fa-arrow-circle-left"></i> Prev Page
                    </button>
                    <button class="btn" id="next-page">
                        Next Page <i class="fas fa-arrow-circle-right"></i>
                    </button>
                </div>
                <div class="col-md-12 col-xs-12">
                    <span class="page-info">
                        Page <span id="page-num"></span> of <span id="page-count"></span>
                    </span>
                </div><br>
                <div class="col-md-12 col-xs-12">
                    <?= $buku->nama_buku ?>
                </div>
            </div>
        </div>
    </div>

    <canvas id="pdf-render" style="width: 100%"></canvas>

    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script>
        const url = '../upload/cover/<?= $buku->buku ?>';

        let pdfDoc = null,
            pageNum = 1,
            pageIsRendering = false,
            pageNumIsPending = null;

        const scale = 1.5,
            canvas = document.querySelector('#pdf-render'),
            ctx = canvas.getContext('2d');

        // Render the page
        const renderPage = num => {
            pageIsRendering = true;

            // Get page
            pdfDoc.getPage(num).then(page => {
                // Set scale
                const viewport = page.getViewport({
                    scale
                });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderCtx = {
                    canvasContext: ctx,
                    viewport
                };

                page.render(renderCtx).promise.then(() => {
                    pageIsRendering = false;

                    if (pageNumIsPending !== null) {
                        renderPage(pageNumIsPending);
                        pageNumIsPending = null;
                    }
                });

                // Output current page
                document.querySelector('#page-num').textContent = num;
            });
        };

        // Check for pages rendering
        const queueRenderPage = num => {
            if (pageIsRendering) {
                pageNumIsPending = num;
            } else {
                renderPage(num);
            }
        };

        // Show Prev Page
        const showPrevPage = () => {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        };

        // Show Next Page
        const showNextPage = () => {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        };

        // Get Document
        pdfjsLib
            .getDocument(url)
            .promise.then(pdfDoc_ => {
                pdfDoc = pdfDoc_;

                document.querySelector('#page-count').textContent = pdfDoc.numPages;

                renderPage(pageNum);
            })
            .catch(err => {
                // Display error
                const div = document.createElement('div');
                div.className = 'error';
                div.appendChild(document.createTextNode(err.message));
                document.querySelector('body').insertBefore(div, canvas);
                // Remove top bar
                document.querySelector('.top-bar').style.display = 'none';
            });

        // Button Events
        document.querySelector('#prev-page').addEventListener('click', showPrevPage);
        document.querySelector('#next-page').addEventListener('click', showNextPage);
    </script>
</body>

</html>