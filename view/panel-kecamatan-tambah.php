<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>
<style>
    #map {
        position: relative;
        width: 100%;
        height: 400px;
        float: left;
    }
</style>

<body id="bg" onload="init()">
    <div class="page-wraper">
        <?php include("include/header.php");?>
        <div class="page-content bg-white">
            <div class="content-block">
                <div class="section-full bg-white browse-job p-t50 p-b20">
                    <div class="container">
                        <div class="row">
                            <?php include("include/sidebar.php");?>
                            <div class="col-xl-9 col-lg-8 m-b30">
                                <div class="job-bx job-profile">
                                    <div class="job-bx-title clearfix">
                                        <h5 class="font-weight-700 pull-left text-uppercase">Tambah Informasi Kecamatan</h5>
                                        <a href="<?php echo $domain ?>panel/kecamatan" class="site-button right-arrow button-sm float-right" cyine-ajax>Kembali</a>
                                    </div>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row m-b30">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="nama">Nama:</label>
                                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Kecamatan">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="baner">Baner</label>
                                                    <div class="custom-file">
                                                        <p class="m-a0">
                                                            <i class="fa fa-upload"></i>
                                                            Unggah Gambar
                                                        </p>
                                                        <input type="file" id="baner" name="baner" class="site-button form-control" id="customFile">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="informasi">Informasi:</label>
                                                    <textarea id="informasi" name="informasi" class="form-control" placeholder="Informasi Kecamatan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-bx-title clearfix">
                                            <h5 class="font-weight-700 pull-left text-uppercase">Google Maps</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group" id="map">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Koordinat:</label>
                                                    <input id="coords" name="coords" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Area:</label>
                                                    <input id="area" name="area" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>Corner:</label>
                                                    <input type="text" id="corner" name="corner" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>Center Latitude:</label>
                                                    <input id="lat" name="lat" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>Center Longitude:</label>
                                                    <input id="lng" name="lng" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="site-button m-b30">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("include/footer.php");?>
        <button class="scroltop fa fa-chevron-up"></button>
    </div>
    <!-- JAVASCRIPT FILES ========================================= -->
    <script src="<?php echo $domain;?>assets/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
    <script src="<?php echo $domain;?>assets/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
    <script src="<?php echo $domain;?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
    <script src="<?php echo $domain;?>assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
    <script src="<?php echo $domain;?>assets/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
    <script src="<?php echo $domain;?>assets/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
    <script src="<?php echo $domain;?>assets/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
    <script src="<?php echo $domain;?>assets/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
    <script src="<?php echo $domain;?>assets/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
    <script src="<?php echo $domain;?>assets/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
    <script src="<?php echo $domain;?>assets/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
    <script src="<?php echo $domain;?>assets/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
    <script>
        var map = null;
        var drawingManager;
        var selectedShape;

        function get_polygon_centroid(pts) {
            //console.log(pts);
            var first = pts[0],
                last = pts[pts.length - 1];
            //if (first.x != last.x || first.y != last.y) pts.push(first);
            //console.log(pts);
            var twicearea = 0,
                x = 0,
                y = 0,
                nPts = pts.length,
                p1, p2, f;
            for (var i = 0, j = nPts - 1; i < nPts; j = i++) {
                p1 = pts[i];
                p2 = pts[j];
                f = (p1.y - first.y) * (p2.x - first.x) - (p2.y - first.y) * (p1.x - first.x);
                twicearea += f;
                x += (p1.x + p2.x - 2 * first.x) * f;
                y += (p1.y + p2.y - 2 * first.y) * f;
            }
            //console.log(x,y);
            f = twicearea * 3;
            return {
                x: x / f + first.x,
                y: y / f + first.y
            };
        }

        function clearSelection() {
            if (selectedShape) {
                if (selectedShape.type !== 'marker') {
                    selectedShape.setEditable(false);
                }

                selectedShape = null;
            }
        }

        function setSelection(shape) {
            if (shape.type !== 'marker') {
                clearSelection();
                shape.setEditable(true);
            }

            selectedShape = shape;

        }

        function deleteSelectedShape() {
            if (selectedShape) {
                selectedShape.setMap(null);
                document.getElementById('coords').value = "";
                document.getElementById('corner').value = "";
                document.getElementById('area').value = "";
                document.getElementById('lat').value = "";
                document.getElementById('lng').value = "";
            }
        }


        function init() {

            var mapOptions = {
                'zoom': 9,
                'center': new google.maps.LatLng(-6.5922803, 107.2711777),
                'mapTypeId': google.maps.MapTypeId.ROADMAP,
                'scaleControl': true
            }
            map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var polyOptions = {
                strokeWeight: 0,
                fillOpacity: 0.45,
                editable: true,
                draggable: true
            };


            drawingManager = new google.maps.drawing.DrawingManager({
                drawingControl: true,
                draggable: true,
                drawingControlOptions: {
                    drawingModes: ['polygon']
                },
                map: map
            });


            google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
                var newShape = e.overlay;

                newShape.type = e.type;

                if (e.type !== google.maps.drawing.OverlayType.MARKER) {
                    // Switch back to non-drawing mode after drawing a shape.
                    drawingManager.setDrawingMode(null);

                    google.maps.event.addListener(newShape, 'click', function(e) {
                        if (e.vertex !== undefined) {
                            if (newShape.type === google.maps.drawing.OverlayType.POLYGON) {
                                var path = newShape.getPaths().getAt(e.path);
                                path.removeAt(e.vertex);
                                if (path.length < 3) {
                                    newShape.setMap(null);
                                }
                            }
                            if (newShape.type === google.maps.drawing.OverlayType.POLYLINE) {
                                var path = newShape.getPath();
                                path.removeAt(e.vertex);
                                if (path.length < 2) {
                                    newShape.setMap(null);
                                }
                            }
                        }
                        setSelection(newShape);
                    });
                    setSelection(newShape);
                } else {
                    google.maps.event.addListener(newShape, 'click', function(e) {
                        setSelection(newShape);
                    });
                    setSelection(newShape);
                }
            });


            function storeCoordinate(xVal, yVal, array) {
                array.push({
                    x: xVal,
                    y: yVal
                });
            }

            google.maps.event.addListener(drawingManager, 'polygoncomplete', function(polygon) {
                var coordStr = "";
                var mcoordStr = [];
                for (var i = 0; i < polygon.getPath().getLength(); i++) {
                    coordStr += polygon.getPath().getAt(i).lat() + " " + polygon.getPath().getAt(i).lng() + ",";
                    storeCoordinate(polygon.getPath().getAt(i).lat(), polygon.getPath().getAt(i).lng(), mcoordStr);

                    //console.log(mcoordStr);
                    //console.log(get_polygon_centroid(mcoordStr));
                    document.getElementById('coords').value = coordStr;
                    document.getElementById('corner').value = polygon.getPath().getLength();
                    document.getElementById('area').value = google.maps.geometry.spherical.computeArea(polygon.getPath()).toFixed(2);
                    document.getElementById('lat').value = get_polygon_centroid(mcoordStr).x;
                    document.getElementById('lng').value = get_polygon_centroid(mcoordStr).y;
                }
            });
            google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
            google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);


        }
    </script>

</html>