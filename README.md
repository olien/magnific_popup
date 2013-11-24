Magnific Popup AddOn für REDAXO 4
=================================

Bindet das jQuery Lightbox Plugin [Magnific Popup](http://dimsemenov.com/plugins/magnific-popup/) in REDAXO Websites ein.

Features
--------

* Automatische Enbindung von Magnific Popup im Frontend inklusive deutscher Lokalisierung
* Zusätzliche optionale Einbindung von jQuery
* Galerie und Einzelbild Module
* Titel und Beschreibungstext für die Bilder wird aus dem Medienpool geholt
* Automatische suchmaschinenfreundliche Image Manager Urls wenn [SEO42](http://github.com/RexDude/seo42) installiert

Codebeispiel Einzelbild
-----------------------

```
<a class="magnific-popup-image" href="./files/image_full.jpg" title="Image Description #1">
	<image src="./files/image_thumb.jpg" width="200" height="200" alt="" />
</a>
```

Codebeispiel Galerie
--------------------

```
<div class="magnific-popup-gallery">
	<a href="./files/image1_full.jpg" title="Image Description #1">
		<image src="./files/image1_thumb.jpg" width="200" height="200" alt="" />
	</a>
	<a href="./files/image2_full.jpg" title="Image Description #2">
		<image src="./files/image2_thumb.jpg" width="200" height="200" alt="" />
	</a>
	<a href="./files/image3_full.jpg" title="Image Description #3">
		<image src="./files/image3_thumb.jpg" width="200" height="200" alt="" />
	</a>
</div>
```

Links
-----

* [Dokumentation](http://dimsemenov.com/plugins/magnific-popup/documentation.html)
* [Beispiele und Plugin Homepage](http://dimsemenov.com/plugins/magnific-popup/)
* Weitere Beispiele in der [CodePen Collection](http://codepen.io/collection/nLcqo)

Hinweise
--------

* Getestet mir REDAXO 4.5
* AddOn-Ordner lautet: `magnific_popup`
* Medienpool-Bildtitel ergbit das `alt` Attribute
* Medienpool-Bildbeschreibung ergbit das `title` Attribute und somit den Bilduntertitel

Changelog
---------

siehe [CHANGELOG.md](CHANGELOG.md)

Lizenz
------

* Magnific Popup: siehe `/magnific_popup/files/LICENSE.md` (MIT Lizenz)
* Magnific Popup REDAXO AddOn: [LICENSE.md](LICENSE.md) (MIT Lizenz)

Credits
-------

* Magnific Popup Lightbox Plugin by Dmitry Semenov
* Parsedown Class by Emanuil Rusev
