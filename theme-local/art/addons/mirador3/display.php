<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="mirador.min.js"></script>
  <title>Mirador 3 Viewer</title>
</head>
<body>
  
<div id="viewer"/> 

<script type="text/javascript">
var mirador = Mirador.viewer({
  "id": "viewer",
  "manifests": {
    "<?php echo $_GET['manifest']; ?>": {
      "provider": "University of Edinburgh"
    }
  },
  "windows": [
    {
      "loadedManifest": "<?php echo $_GET['manifest']; ?>",
      "canvasIndex": 2,
      "thumbnailNavigationPosition": 'far-bottom'
    }
  ]
});
</script>
</body>
</html>