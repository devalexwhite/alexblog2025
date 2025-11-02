import eleventyNavigationPlugin from "@11ty/eleventy-navigation";
import { feedPlugin } from "@11ty/eleventy-plugin-rss";


export default function (eleventyConfig) {
	eleventyConfig.addPassthroughCopy("bundle.css");
	eleventyConfig.addCollection("inProgressBooks", function (collectionsApi) {
		return collectionsApi.getFilteredByTag("books").filter(function (item) {
			// Side-step tags and do your own filtering
			return item.data.status == "reading";
		});
	});
	
	eleventyConfig.addCollection("finishedBooks", function (collectionsApi) {
		return collectionsApi.getFilteredByTag("books").filter(function (item) {
			// Side-step tags and do your own filtering
			return item.data.status == "finished";
		});
	});


	eleventyConfig.addPassthroughCopy("**/*.jpeg");
	eleventyConfig.addPassthroughCopy("**/*.webp");
	eleventyConfig.addPassthroughCopy("**/*.mov");
	eleventyConfig.addPassthroughCopy("**/*.jpg");
	eleventyConfig.addPassthroughCopy("**/*.png");
	eleventyConfig.addPlugin(eleventyNavigationPlugin);
	eleventyConfig.addPlugin(feedPlugin, {
		type: "atom", // or "rss", "json"
		outputPath: "/mumbles-feed.xml",
		collection: {
			name: "mumbles", // iterate over `collections.posts`
			limit: 0,     // 0 means no limit
		},
		metadata: {
			language: "en",
			title: "Alex White's Mumbles",
			subtitle: "Short updates from me that don't need an article.",
			base: "https://thatalexguy.dev/",
			author: {
				name: "Alex White",
				email: "alex.white@hey.com", // Optional
			}
		}
	});
	eleventyConfig.addPlugin(feedPlugin, {
		type: "atom", // or "rss", "json"
		outputPath: "/feed.xml",
		collection: {
			name: "posts", // iterate over `collections.posts`
			limit: 0,     // 0 means no limit
		},
		metadata: {
			language: "en",
			title: "Alex White's Blog",
			subtitle: "Ramblings of a tech guy in Ohio with a bike problem.",
			base: "https://thatalexguy.dev/",
			author: {
				name: "Alex White",
				email: "alex.white@hey.com", // Optional
			}
		}
	});
};