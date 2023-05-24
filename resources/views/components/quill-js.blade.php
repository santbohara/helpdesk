<script type="module">

    Quill.register('modules/toggleFullscreen', window.QuillToggleFullscreenButton);

    // Initialize QUill editor
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'font': [] }],
                [{ header: [1, 2, 3, 4, 5, 6,  false] }],
                ['bold', 'italic', 'underline','strike'],
                [{ 'color': [] }, { 'background': [] }],
                ['image', 'code-block'],
                ['link'],
                [{ 'align': [] }],
                [{ 'script': 'sub'}, { 'script': 'super' }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['clean']
            ],
            toggleFullscreen: true
        },
    });

    quill.on('text-change', function(delta, source) {
        updateHtmlOutput()
    })

    // When the convert button is clicked, update output
    $('#btn-convert').on('click', () => { updateHtmlOutput() })

    // Return the HTML content of the editor
    function getQuillHtml() { return quill.root.innerHTML; }

    function updateHtmlOutput()
    {
        let html = getQuillHtml();
        console.log ( html );
        // document.getElementById('markDownContent').innerText = html;
        document.getElementById('markDownContent').value = html;
    }

    updateHtmlOutput()
</script>
