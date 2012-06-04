.color_label {
    display:block;
    width: 16px;
    height: 16px;
    float:left;
    margin-left:3px;
    margin-right:3px;
    border: 1px #666666 solid;
}

.calendar_label {
    display:block;
    width:100%;
    padding:1px;
    margin-bottom:2px;
}

{foreach from=$colorList key=id item=color}
.calendar_label_{$id} {
    background-color: #{$color};
}

{/foreach}