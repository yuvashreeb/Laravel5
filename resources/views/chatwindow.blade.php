<!doctype html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Chat Window</title>
        <script src="/js/jquery-2.2.2.min.js"></script>
        <style>
            .top{
                margin-top: 40px;
            }
            .border{
                margin-top: 40px;
                height: 300px;
                border: 1px solid #C1C1C1;
                overflow-style: scrollbar;
                overflow-y: scroll;
            }
        </style>
    </head>
    <body>
        <script> var name = "<?php echo $name; ?>";</script>
        <script src="/js/chatwindow.js"></script>
        <div class="container">
            <div class="col-md-7 border">
            </div>
            <div class="col-md-12 top">     
                <div class="col-md-6">
                    <div class="form-group">
                        <label for='message' class="control-label">Message:</label>
                        <input type="text" id='message' name="message" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>