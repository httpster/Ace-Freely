# Ace Freely

## An [Ace Editor](http://ace.c9.io/) field type for [Craft CMS](https://buildwithcraft.com/)

### Installation
1. Copy the acefreely folder into your plugins folder.
2. Go to Settings > Plugins in the Craft control panel.
3. Install the Ace Freely plugin.
4. You can now create Ace Freely fields from within Settings > Fields

### Usage

There are a few different ways to use Ace Freely depending on how you want to output your content.

#### Code Sample

Wrap the field's value in a `<pre>` element to output a code sample.

`<pre>{{ entry.aceFreelyFieldHandle }}</pre>`

#### HTML, CSS or JS Sample

Pass HTML, CSS, or JS content through Twig's `[raw](http://twig.sensiolabs.org/doc/filters/raw.html)` filter.

`{{ entry.aceFreelyFieldHandle | raw }}`

#### Markdown Sample

Pass Markdown content through Craft's `[markdown](http://buildwithcraft.com/docs/templating/filters#markdown-or-md)` filter

`{{ entry.aceFreelyFieldHandle | markdown }}`

#### Twig Sample

Pass Twig content through Ace Freely's `ace_parse` filter.

`{{ entry.aceFreelyFieldHandle | ace_parse }}`
