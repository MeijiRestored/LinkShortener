# Simple PHP link shortener

A simple PHP link shortener web app.

## Config

Edit `app/Config/config.json` to change URL mappings.

## Example 

```json
{
  "rick": "https://youtu.be/dQw4w9WgXcQ"
}
```

Opening `/rick` will redirect to `https://youtu.be/dQw4w9WgXcQ`.

Opening anything else will result in `HTTP 404`.

## Usage

Set up your webserver with `/public` as root folder.
