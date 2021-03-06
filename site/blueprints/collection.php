<?php if(!defined('KIRBY')) exit ?>

title: Collection
files: true
pages: false
deletable: true
preview: false
fields:
  title:
    label: Title
    type:  text
  gallery:
    label: Gallery
    type: builder
    fieldsets:
      thumb:
        label: Image
        entry: >
               <table style="width:100%; font-size: 11px">
               <tr>
               <td style="width:33%">Image</td>
               <td style="width:33%">Top</td>
               <td style="width:33%">Position</td>
               </tr>
               <tr>
               <td style="width:33%"><img src="{{_fileUrl}}{{content}}" width="100px"><br>{{content}}</td>
               <td style="width:33%">{{top}}</td>
               <td style="width:33%">{{position}}</td>
               </tr>
               </table>
        fields:
          content:
            label: Image
            type: image
            width: 1/3
          position:
            label: Position
            type: select
            width: 1/3
            default: left
            options:
              left: Left
              midleft: Mid-Left
              center: Center
              midright: Mid-Right
              right: Right
          top:
            label: Top
            type: number
            width: 1/3