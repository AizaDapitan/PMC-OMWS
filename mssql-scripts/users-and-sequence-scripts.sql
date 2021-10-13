USE [omws_db]
GO
/****** Object:  Table [dbo].[sequence]    Script Date: 10/13/2021 10:19:53 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[sequence](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[sequence_id] [int] NOT NULL,
	[is_open] [bit] NOT NULL,
	[is_manual] [bit] NOT NULL,
	[date_created] [datetime] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[is_fabricated] [bit] NOT NULL,
	[created_by] [nvarchar](max) NULL,
	[updated_by] [nvarchar](max) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[sequence] ON 
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (1, 3149, 0, 0, CAST(N'2021-05-17T00:00:01.000' AS DateTime), CAST(N'2021-05-17T00:00:01.000' AS DateTime), CAST(N'2021-05-17T00:00:01.000' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (2, 3150, 0, 0, CAST(N'2021-05-17T12:00:01.000' AS DateTime), CAST(N'2021-05-17T12:00:01.000' AS DateTime), CAST(N'2021-05-17T09:36:36.617' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (3, 239, 0, 0, CAST(N'2021-05-17T07:00:01.000' AS DateTime), CAST(N'2021-05-17T07:00:01.000' AS DateTime), CAST(N'2021-05-18T17:28:50.313' AS DateTime), 0, N'ict admin', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (4, 3151, 0, 0, CAST(N'2021-05-18T00:00:01.000' AS DateTime), CAST(N'2021-05-18T09:36:36.627' AS DateTime), CAST(N'2021-05-19T07:02:25.807' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (5, 3152, 0, 0, CAST(N'2021-05-18T12:00:01.000' AS DateTime), CAST(N'2021-05-18T09:36:36.647' AS DateTime), CAST(N'2021-05-19T00:00:36.530' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (6, 240, 0, 0, CAST(N'2021-05-18T07:00:01.000' AS DateTime), CAST(N'2021-05-18T07:00:01.000' AS DateTime), CAST(N'2021-05-18T18:00:39.747' AS DateTime), 1, N'ict admin', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (7, 241, 0, 0, CAST(N'2021-05-18T21:30:11.180' AS DateTime), CAST(N'2021-05-18T21:29:44.937' AS DateTime), CAST(N'2021-05-20T06:58:59.817' AS DateTime), 1, N'jtalaugon', N'jtalaugon')
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (8, 3153, 0, 0, CAST(N'2021-05-19T00:00:01.000' AS DateTime), CAST(N'2021-05-19T00:00:36.520' AS DateTime), CAST(N'2021-05-20T00:01:02.850' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (9, 3154, 0, 0, CAST(N'2021-05-19T12:00:01.000' AS DateTime), CAST(N'2021-05-19T00:00:36.527' AS DateTime), CAST(N'2021-05-20T00:00:02.877' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (10, 242, 0, 0, CAST(N'2021-05-19T21:12:59.483' AS DateTime), CAST(N'2021-05-19T21:12:59.593' AS DateTime), CAST(N'2021-05-21T06:51:07.393' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (11, 3155, 0, 0, CAST(N'2021-05-20T00:00:01.000' AS DateTime), CAST(N'2021-05-20T00:00:02.870' AS DateTime), CAST(N'2021-05-21T00:01:23.430' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (12, 3156, 0, 0, CAST(N'2021-05-20T12:00:01.000' AS DateTime), CAST(N'2021-05-20T00:00:02.873' AS DateTime), CAST(N'2021-05-21T00:00:22.503' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (13, 243, 0, 0, CAST(N'2021-05-20T21:27:36.297' AS DateTime), CAST(N'2021-05-20T21:27:36.270' AS DateTime), CAST(N'2021-05-22T06:40:51.410' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (14, 3159, 0, 0, CAST(N'2021-05-21T12:00:01.000' AS DateTime), CAST(N'2021-05-21T12:00:01.000' AS DateTime), CAST(N'2021-05-22T07:40:26.373' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (15, 3158, 0, 0, CAST(N'2021-05-21T00:00:01.000' AS DateTime), CAST(N'2021-05-21T00:00:01.000' AS DateTime), CAST(N'2021-05-22T00:00:43.207' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (16, 244, 0, 0, CAST(N'2021-05-21T23:03:23.673' AS DateTime), CAST(N'2021-05-21T23:03:23.663' AS DateTime), CAST(N'2021-05-24T08:40:53.527' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (17, 3160, 0, 0, CAST(N'2021-05-22T00:00:01.000' AS DateTime), CAST(N'2021-05-22T00:00:13.093' AS DateTime), CAST(N'2021-05-22T12:00:17.890' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (18, 3161, 0, 0, CAST(N'2021-05-22T12:00:01.000' AS DateTime), CAST(N'2021-05-22T00:00:13.097' AS DateTime), CAST(N'2021-05-23T20:36:28.577' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (19, 3162, 0, 0, CAST(N'2021-05-23T00:00:01.000' AS DateTime), CAST(N'2021-05-23T20:36:28.583' AS DateTime), CAST(N'2021-05-24T08:41:41.133' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (20, 3163, 0, 0, CAST(N'2021-05-23T12:00:01.000' AS DateTime), CAST(N'2021-05-23T20:36:28.587' AS DateTime), CAST(N'2021-05-24T00:00:19.173' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (21, 245, 0, 0, CAST(N'2021-05-23T20:38:00.697' AS DateTime), CAST(N'2021-05-23T20:38:00.650' AS DateTime), CAST(N'2021-05-24T18:00:57.947' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (22, 3164, 0, 0, CAST(N'2021-05-24T00:00:01.000' AS DateTime), CAST(N'2021-05-24T00:00:19.167' AS DateTime), CAST(N'2021-05-25T00:01:58.000' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (23, 3165, 0, 0, CAST(N'2021-05-24T12:00:01.000' AS DateTime), CAST(N'2021-05-24T00:00:19.170' AS DateTime), CAST(N'2021-05-25T00:00:57.987' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (24, 246, 0, 0, CAST(N'2021-05-24T20:59:17.610' AS DateTime), CAST(N'2021-05-24T20:59:17.407' AS DateTime), CAST(N'2021-05-25T20:38:40.963' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (25, 3166, 0, 0, CAST(N'2021-05-25T00:00:01.000' AS DateTime), CAST(N'2021-05-25T00:00:57.980' AS DateTime), CAST(N'2021-05-26T00:01:32.317' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (26, 3167, 0, 0, CAST(N'2021-05-25T12:00:01.000' AS DateTime), CAST(N'2021-05-25T00:00:57.983' AS DateTime), CAST(N'2021-05-26T00:00:18.517' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (27, 247, 0, 0, CAST(N'2021-05-25T20:15:58.843' AS DateTime), CAST(N'2021-05-25T20:15:58.753' AS DateTime), CAST(N'2021-05-26T18:00:01.940' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (28, 3168, 0, 0, CAST(N'2021-05-26T00:00:01.000' AS DateTime), CAST(N'2021-05-26T00:00:18.510' AS DateTime), CAST(N'2021-05-27T07:06:48.920' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (29, 3169, 0, 0, CAST(N'2021-05-26T12:00:01.000' AS DateTime), CAST(N'2021-05-26T00:00:18.513' AS DateTime), CAST(N'2021-05-27T07:06:19.230' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (30, 3170, 0, 0, CAST(N'2021-05-27T00:00:01.000' AS DateTime), CAST(N'2021-05-27T07:06:19.227' AS DateTime), CAST(N'2021-05-28T07:37:35.413' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (31, 3171, 0, 0, CAST(N'2021-05-27T12:00:01.000' AS DateTime), CAST(N'2021-05-27T07:06:19.227' AS DateTime), CAST(N'2021-05-28T07:38:05.287' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (32, 3172, 0, 0, CAST(N'2021-05-28T00:00:01.000' AS DateTime), CAST(N'2021-05-28T07:37:35.400' AS DateTime), CAST(N'2021-05-29T07:37:35.277' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (33, 3173, 0, 0, CAST(N'2021-05-28T12:00:01.000' AS DateTime), CAST(N'2021-05-28T07:37:35.407' AS DateTime), CAST(N'2021-05-29T00:00:05.047' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (34, 248, 0, 0, CAST(N'2021-05-28T22:01:51.137' AS DateTime), CAST(N'2021-05-28T22:01:50.993' AS DateTime), CAST(N'2021-05-29T18:00:28.180' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (35, 3174, 0, 0, CAST(N'2021-05-29T00:00:01.000' AS DateTime), CAST(N'2021-05-29T00:00:05.043' AS DateTime), CAST(N'2021-05-30T00:01:28.197' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (36, 3175, 0, 0, CAST(N'2021-05-29T12:00:01.000' AS DateTime), CAST(N'2021-05-29T00:00:05.047' AS DateTime), CAST(N'2021-05-30T00:00:28.197' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (37, 3176, 0, 0, CAST(N'2021-05-30T00:00:01.000' AS DateTime), CAST(N'2021-05-30T00:00:28.190' AS DateTime), CAST(N'2021-05-31T00:00:39.550' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (38, 3177, 0, 0, CAST(N'2021-05-30T12:00:01.000' AS DateTime), CAST(N'2021-05-30T00:00:28.193' AS DateTime), CAST(N'2021-05-31T00:00:09.473' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (39, 3180, 0, 0, CAST(N'2021-05-31T12:00:01.000' AS DateTime), CAST(N'2021-05-31T12:00:01.000' AS DateTime), CAST(N'2021-06-01T00:00:34.113' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (40, 3179, 0, 0, CAST(N'2021-05-31T00:00:01.000' AS DateTime), CAST(N'2021-05-31T00:00:01.000' AS DateTime), CAST(N'2021-06-01T00:01:34.200' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (41, 249, 0, 0, CAST(N'2021-05-31T08:34:50.737' AS DateTime), CAST(N'2021-05-31T08:34:50.497' AS DateTime), CAST(N'2021-05-31T18:00:34.023' AS DateTime), 1, N'jbpadao', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (42, 3181, 0, 0, CAST(N'2021-06-01T00:00:01.000' AS DateTime), CAST(N'2021-06-01T00:00:34.110' AS DateTime), CAST(N'2021-06-02T00:00:59.000' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (43, 3182, 0, 0, CAST(N'2021-06-01T12:00:01.000' AS DateTime), CAST(N'2021-06-01T00:00:34.113' AS DateTime), CAST(N'2021-06-02T00:00:29.080' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (44, 250, 0, 0, CAST(N'2021-06-01T06:59:14.483' AS DateTime), CAST(N'2021-06-01T06:59:14.330' AS DateTime), CAST(N'2021-06-02T07:51:20.867' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (45, 251, 0, 0, CAST(N'2021-06-01T19:09:17.923' AS DateTime), CAST(N'2021-06-01T19:09:17.733' AS DateTime), CAST(N'2021-06-03T07:05:36.860' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (46, 3183, 0, 0, CAST(N'2021-06-02T00:00:01.000' AS DateTime), CAST(N'2021-06-02T00:00:29.073' AS DateTime), CAST(N'2021-06-03T00:00:58.560' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (47, 3184, 0, 0, CAST(N'2021-06-02T12:00:01.000' AS DateTime), CAST(N'2021-06-02T00:00:29.077' AS DateTime), CAST(N'2021-06-03T00:00:28.297' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (48, 252, 0, 0, CAST(N'2021-06-02T21:28:47.287' AS DateTime), CAST(N'2021-06-02T21:28:47.117' AS DateTime), CAST(N'2021-06-04T07:33:05.430' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (49, 3185, 0, 0, CAST(N'2021-06-03T00:00:01.000' AS DateTime), CAST(N'2021-06-03T00:00:28.290' AS DateTime), CAST(N'2021-06-04T00:00:32.173' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (50, 3186, 0, 0, CAST(N'2021-06-03T12:00:01.000' AS DateTime), CAST(N'2021-06-03T00:00:28.293' AS DateTime), CAST(N'2021-06-04T00:00:02.270' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (51, 3189, 0, 0, CAST(N'2021-06-04T12:00:01.000' AS DateTime), CAST(N'2021-06-04T12:00:01.000' AS DateTime), CAST(N'2021-06-05T00:00:01.627' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (52, 3188, 0, 0, CAST(N'2021-06-04T00:00:01.000' AS DateTime), CAST(N'2021-06-04T00:00:01.000' AS DateTime), CAST(N'2021-06-05T00:00:34.087' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (53, 253, 0, 0, CAST(N'2021-06-04T07:32:59.280' AS DateTime), CAST(N'2021-06-04T07:32:58.973' AS DateTime), CAST(N'2021-06-05T07:12:46.753' AS DateTime), 1, N'jbpadao', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (54, 3190, 0, 0, CAST(N'2021-06-05T00:00:01.000' AS DateTime), CAST(N'2021-06-05T00:00:01.620' AS DateTime), CAST(N'2021-06-06T00:00:21.297' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (55, 3191, 0, 0, CAST(N'2021-06-05T12:00:01.000' AS DateTime), CAST(N'2021-06-05T00:00:01.623' AS DateTime), CAST(N'2021-06-06T00:00:21.070' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (56, 254, 0, 0, CAST(N'2021-06-05T07:12:41.093' AS DateTime), CAST(N'2021-06-05T07:12:41.193' AS DateTime), CAST(N'2021-06-05T18:00:21.053' AS DateTime), 1, N'jbpadao', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (57, 3192, 0, 0, CAST(N'2021-06-06T00:00:01.000' AS DateTime), CAST(N'2021-06-06T00:00:21.067' AS DateTime), CAST(N'2021-06-07T00:00:15.830' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (58, 3193, 0, 0, CAST(N'2021-06-06T12:00:01.000' AS DateTime), CAST(N'2021-06-06T00:00:21.067' AS DateTime), CAST(N'2021-06-07T00:00:21.097' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (59, 255, 0, 0, CAST(N'2021-06-06T21:32:59.160' AS DateTime), CAST(N'2021-06-06T21:32:58.717' AS DateTime), CAST(N'2021-06-08T13:35:25.707' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (60, 3194, 0, 0, CAST(N'2021-06-07T00:00:01.000' AS DateTime), CAST(N'2021-06-07T00:00:15.820' AS DateTime), CAST(N'2021-06-08T00:00:54.963' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (61, 3195, 0, 0, CAST(N'2021-06-07T12:00:01.000' AS DateTime), CAST(N'2021-06-07T00:00:15.823' AS DateTime), CAST(N'2021-06-08T00:00:24.980' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (62, 256, 0, 0, CAST(N'2021-06-07T21:05:52.430' AS DateTime), CAST(N'2021-06-07T21:05:51.163' AS DateTime), CAST(N'2021-06-08T18:00:50.293' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (63, 3198, 0, 0, CAST(N'2021-06-08T12:00:01.000' AS DateTime), CAST(N'2021-06-08T12:00:01.000' AS DateTime), CAST(N'2021-06-09T00:00:37.917' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (64, 3197, 0, 0, CAST(N'2021-06-08T00:00:01.000' AS DateTime), CAST(N'2021-06-08T00:00:01.000' AS DateTime), CAST(N'2021-06-09T00:00:50.123' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (65, 257, 0, 0, CAST(N'2021-06-08T21:21:00.780' AS DateTime), CAST(N'2021-06-08T21:20:58.720' AS DateTime), CAST(N'2021-06-11T06:54:00.957' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (66, 3199, 0, 0, CAST(N'2021-06-09T00:00:01.000' AS DateTime), CAST(N'2021-06-09T00:00:37.910' AS DateTime), CAST(N'2021-06-10T00:01:01.870' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (67, 3200, 0, 0, CAST(N'2021-06-09T12:00:01.000' AS DateTime), CAST(N'2021-06-09T00:00:37.913' AS DateTime), CAST(N'2021-06-10T00:00:01.783' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (68, 258, 0, 0, CAST(N'2021-06-09T21:33:15.470' AS DateTime), CAST(N'2021-06-09T21:33:12.643' AS DateTime), CAST(N'2021-06-11T06:54:03.247' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (69, 3203, 0, 0, CAST(N'2021-06-10T12:00:01.000' AS DateTime), CAST(N'2021-06-10T12:00:01.000' AS DateTime), CAST(N'2021-06-11T00:00:19.623' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (70, 3202, 0, 0, CAST(N'2021-06-10T00:00:01.773' AS DateTime), CAST(N'2021-06-10T00:00:01.773' AS DateTime), CAST(N'2021-06-11T00:01:19.507' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (71, 259, 0, 0, CAST(N'2021-06-10T20:56:15.047' AS DateTime), CAST(N'2021-06-10T20:56:11.407' AS DateTime), CAST(N'2021-06-12T06:57:50.800' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (72, 3204, 0, 0, CAST(N'2021-06-11T00:00:01.000' AS DateTime), CAST(N'2021-06-11T00:00:19.617' AS DateTime), CAST(N'2021-06-12T00:00:24.300' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (73, 3205, 0, 0, CAST(N'2021-06-11T12:00:01.000' AS DateTime), CAST(N'2021-06-11T00:00:19.620' AS DateTime), CAST(N'2021-06-12T00:00:16.833' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (74, 260, 0, 0, CAST(N'2021-06-11T21:53:41.583' AS DateTime), CAST(N'2021-06-11T21:53:37.340' AS DateTime), CAST(N'2021-06-12T18:00:15.050' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (75, 3206, 0, 0, CAST(N'2021-06-12T00:00:01.000' AS DateTime), CAST(N'2021-06-12T00:00:16.827' AS DateTime), CAST(N'2021-06-13T00:00:45.093' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (76, 3207, 0, 0, CAST(N'2021-06-12T12:00:01.000' AS DateTime), CAST(N'2021-06-12T00:00:16.830' AS DateTime), CAST(N'2021-06-13T00:00:15.080' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (77, 3208, 0, 0, CAST(N'2021-06-13T00:00:01.000' AS DateTime), CAST(N'2021-06-13T00:00:15.073' AS DateTime), CAST(N'2021-06-14T00:00:37.127' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (78, 3209, 0, 0, CAST(N'2021-06-13T12:00:01.000' AS DateTime), CAST(N'2021-06-13T00:00:15.077' AS DateTime), CAST(N'2021-06-14T00:00:15.213' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (79, 3210, 0, 0, CAST(N'2021-06-14T00:00:01.000' AS DateTime), CAST(N'2021-06-14T00:00:15.203' AS DateTime), CAST(N'2021-06-15T00:00:15.240' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (80, 3211, 0, 0, CAST(N'2021-06-14T12:00:01.000' AS DateTime), CAST(N'2021-06-14T00:00:15.207' AS DateTime), CAST(N'2021-06-15T00:00:01.747' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (81, 261, 0, 0, CAST(N'2021-06-14T05:51:10.793' AS DateTime), CAST(N'2021-06-14T05:51:04.943' AS DateTime), CAST(N'2021-06-14T18:00:00.250' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (82, 262, 0, 0, CAST(N'2021-06-14T20:36:32.723' AS DateTime), CAST(N'2021-06-14T20:36:26.367' AS DateTime), CAST(N'2021-06-15T18:00:15.273' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (83, 3212, 0, 0, CAST(N'2021-06-15T00:00:01.000' AS DateTime), CAST(N'2021-06-15T00:00:01.730' AS DateTime), CAST(N'2021-06-16T00:00:18.467' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (84, 3213, 0, 0, CAST(N'2021-06-15T12:00:01.000' AS DateTime), CAST(N'2021-06-15T00:00:01.743' AS DateTime), CAST(N'2021-06-16T00:00:15.313' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (85, 263, 0, 0, CAST(N'2021-06-15T23:19:18.403' AS DateTime), CAST(N'2021-06-15T23:19:11.247' AS DateTime), CAST(N'2021-06-16T18:00:11.597' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (86, 3214, 0, 0, CAST(N'2021-06-16T00:00:01.000' AS DateTime), CAST(N'2021-06-16T00:00:15.303' AS DateTime), CAST(N'2021-06-17T00:00:23.913' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (87, 3215, 0, 0, CAST(N'2021-06-16T12:00:01.000' AS DateTime), CAST(N'2021-06-16T00:00:15.307' AS DateTime), CAST(N'2021-06-17T00:00:20.203' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (88, 264, 0, 0, CAST(N'2021-06-16T21:40:19.420' AS DateTime), CAST(N'2021-06-16T21:40:13.953' AS DateTime), CAST(N'2021-06-17T18:00:24.193' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (89, 3218, 0, 0, CAST(N'2021-06-17T12:00:01.000' AS DateTime), CAST(N'2021-06-17T00:00:20.197' AS DateTime), CAST(N'2021-06-18T00:00:00.760' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (90, 3217, 0, 0, CAST(N'2021-06-17T00:00:01.000' AS DateTime), CAST(N'2021-06-17T00:00:20.197' AS DateTime), CAST(N'2021-06-18T00:00:30.727' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (91, 265, 0, 0, CAST(N'2021-06-17T21:22:27.270' AS DateTime), CAST(N'2021-06-17T21:22:22.950' AS DateTime), CAST(N'2021-06-18T18:00:28.873' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (92, 3221, 0, 0, CAST(N'2021-06-18T12:00:01.000' AS DateTime), CAST(N'2021-06-18T00:00:00.747' AS DateTime), CAST(N'2021-06-19T00:00:14.337' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (93, 3220, 0, 0, CAST(N'2021-06-18T00:00:01.000' AS DateTime), CAST(N'2021-06-18T00:00:00.747' AS DateTime), CAST(N'2021-06-19T00:00:28.390' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (94, 266, 0, 0, CAST(N'2021-06-18T20:07:57.957' AS DateTime), CAST(N'2021-06-18T20:08:02.340' AS DateTime), CAST(N'2021-06-19T18:00:20.880' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (95, 3222, 0, 0, CAST(N'2021-06-19T00:00:01.000' AS DateTime), CAST(N'2021-06-19T00:00:14.323' AS DateTime), CAST(N'2021-06-20T00:00:52.770' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (96, 3223, 0, 0, CAST(N'2021-06-19T12:00:01.000' AS DateTime), CAST(N'2021-06-19T00:00:14.327' AS DateTime), CAST(N'2021-06-20T00:00:22.787' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (97, 3224, 0, 0, CAST(N'2021-06-20T00:00:01.000' AS DateTime), CAST(N'2021-06-20T00:00:22.777' AS DateTime), CAST(N'2021-06-21T00:00:18.580' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (98, 3225, 0, 0, CAST(N'2021-06-20T12:00:01.000' AS DateTime), CAST(N'2021-06-20T00:00:22.777' AS DateTime), CAST(N'2021-06-21T00:00:41.547' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (99, 267, 0, 0, CAST(N'2021-06-20T21:22:00.633' AS DateTime), CAST(N'2021-06-20T21:22:05.540' AS DateTime), CAST(N'2021-06-21T18:00:20.227' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (100, 3226, 0, 0, CAST(N'2021-06-21T00:00:01.000' AS DateTime), CAST(N'2021-06-21T00:00:18.550' AS DateTime), CAST(N'2021-06-22T04:16:41.930' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (101, 3227, 0, 0, CAST(N'2021-06-21T12:00:01.000' AS DateTime), CAST(N'2021-06-21T00:00:18.563' AS DateTime), CAST(N'2021-06-22T04:16:12.440' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (102, 3228, 0, 0, CAST(N'2021-06-22T00:00:01.000' AS DateTime), CAST(N'2021-06-22T04:16:11.947' AS DateTime), CAST(N'2021-06-23T04:16:19.927' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (103, 3229, 0, 0, CAST(N'2021-06-22T12:00:01.000' AS DateTime), CAST(N'2021-06-22T04:16:11.950' AS DateTime), CAST(N'2021-06-23T00:00:00.977' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (104, 268, 0, 0, CAST(N'2021-06-22T04:21:44.017' AS DateTime), CAST(N'2021-06-22T04:21:44.013' AS DateTime), CAST(N'2021-06-23T14:12:45.973' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (105, 269, 0, 0, CAST(N'2021-06-22T21:22:04.693' AS DateTime), CAST(N'2021-06-22T21:22:04.713' AS DateTime), CAST(N'2021-06-24T07:18:14.670' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (106, 3230, 0, 0, CAST(N'2021-06-23T00:00:01.000' AS DateTime), CAST(N'2021-06-23T00:00:00.960' AS DateTime), CAST(N'2021-06-24T00:00:46.940' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (107, 3231, 0, 0, CAST(N'2021-06-23T12:00:01.000' AS DateTime), CAST(N'2021-06-23T00:00:00.963' AS DateTime), CAST(N'2021-06-24T00:00:16.953' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (108, 270, 0, 0, CAST(N'2021-06-23T20:20:55.027' AS DateTime), CAST(N'2021-06-23T20:20:55.053' AS DateTime), CAST(N'2021-06-24T18:00:53.397' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (109, 3234, 0, 0, CAST(N'2021-06-24T12:00:01.000' AS DateTime), CAST(N'2021-06-24T00:00:16.940' AS DateTime), CAST(N'2021-06-25T00:00:21.127' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (110, 3233, 0, 0, CAST(N'2021-06-24T00:00:01.000' AS DateTime), CAST(N'2021-06-24T00:00:01.000' AS DateTime), CAST(N'2021-06-25T00:00:51.057' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (111, 271, 0, 0, CAST(N'2021-06-24T21:12:34.873' AS DateTime), CAST(N'2021-06-24T21:12:34.903' AS DateTime), CAST(N'2021-06-25T18:00:41.490' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (112, 3237, 0, 0, CAST(N'2021-06-25T12:00:01.000' AS DateTime), CAST(N'2021-06-25T00:00:21.117' AS DateTime), CAST(N'2021-06-26T00:00:12.537' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (113, 3236, 0, 0, CAST(N'2021-06-25T00:00:01.000' AS DateTime), CAST(N'2021-06-25T00:00:21.117' AS DateTime), CAST(N'2021-06-26T00:00:42.553' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (114, 272, 0, 0, CAST(N'2021-06-25T20:22:31.487' AS DateTime), CAST(N'2021-06-25T20:22:31.507' AS DateTime), CAST(N'2021-06-26T18:00:53.240' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (115, 3240, 0, 0, CAST(N'2021-06-26T12:00:01.000' AS DateTime), CAST(N'2021-06-26T00:00:12.523' AS DateTime), CAST(N'2021-06-27T00:00:53.100' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (116, 3239, 0, 0, CAST(N'2021-06-26T00:00:01.000' AS DateTime), CAST(N'2021-06-26T00:00:12.523' AS DateTime), CAST(N'2021-06-27T00:01:53.087' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (117, 3241, 0, 0, CAST(N'2021-06-27T00:00:01.000' AS DateTime), CAST(N'2021-06-27T00:00:53.090' AS DateTime), CAST(N'2021-06-28T00:00:52.963' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (118, 3242, 0, 0, CAST(N'2021-06-27T12:00:01.000' AS DateTime), CAST(N'2021-06-27T00:00:53.090' AS DateTime), CAST(N'2021-06-28T00:01:52.960' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (119, 3243, 0, 0, CAST(N'2021-06-28T00:00:01.000' AS DateTime), CAST(N'2021-06-28T00:00:52.950' AS DateTime), CAST(N'2021-06-29T00:01:15.077' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (120, 3244, 0, 0, CAST(N'2021-06-28T12:00:01.000' AS DateTime), CAST(N'2021-06-28T00:00:52.953' AS DateTime), CAST(N'2021-06-29T00:00:15.537' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (121, 273, 0, 0, CAST(N'2021-06-28T06:58:27.620' AS DateTime), CAST(N'2021-06-28T06:58:27.723' AS DateTime), CAST(N'2021-06-29T06:55:57.123' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (122, 274, 0, 0, CAST(N'2021-06-28T21:00:14.367' AS DateTime), CAST(N'2021-06-28T21:00:07.010' AS DateTime), CAST(N'2021-06-29T18:00:27.880' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (123, 3247, 0, 0, CAST(N'2021-06-29T12:00:01.000' AS DateTime), CAST(N'2021-06-29T00:00:15.527' AS DateTime), CAST(N'2021-06-30T00:00:19.360' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (124, 3246, 0, 0, CAST(N'2021-06-29T00:00:01.000' AS DateTime), CAST(N'2021-06-29T00:00:15.527' AS DateTime), CAST(N'2021-06-30T00:00:27.757' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (125, 275, 0, 0, CAST(N'2021-06-29T21:01:30.493' AS DateTime), CAST(N'2021-06-29T21:01:30.247' AS DateTime), CAST(N'2021-06-30T18:00:27.787' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (126, 3248, 0, 0, CAST(N'2021-06-30T00:00:01.000' AS DateTime), CAST(N'2021-06-30T00:00:19.347' AS DateTime), CAST(N'2021-07-01T00:00:27.877' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (127, 3249, 0, 0, CAST(N'2021-06-30T12:00:01.000' AS DateTime), CAST(N'2021-06-30T00:00:19.350' AS DateTime), CAST(N'2021-07-01T00:00:17.463' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (128, 276, 0, 0, CAST(N'2021-06-30T21:33:34.480' AS DateTime), CAST(N'2021-06-30T21:33:33.367' AS DateTime), CAST(N'2021-07-01T18:00:39.343' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (129, 3250, 0, 0, CAST(N'2021-07-01T00:00:01.000' AS DateTime), CAST(N'2021-07-01T00:00:17.453' AS DateTime), CAST(N'2021-07-02T00:00:36.520' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (130, 3251, 0, 0, CAST(N'2021-07-01T12:00:01.000' AS DateTime), CAST(N'2021-07-01T00:00:17.457' AS DateTime), CAST(N'2021-07-02T00:00:06.613' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (131, 277, 0, 0, CAST(N'2021-07-01T21:18:22.040' AS DateTime), CAST(N'2021-07-01T21:18:22.410' AS DateTime), CAST(N'2021-07-02T18:00:26.607' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (132, 3252, 0, 0, CAST(N'2021-07-02T00:00:01.000' AS DateTime), CAST(N'2021-07-02T00:00:06.597' AS DateTime), CAST(N'2021-07-03T00:00:33.377' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (133, 3253, 0, 0, CAST(N'2021-07-02T12:00:01.000' AS DateTime), CAST(N'2021-07-02T00:00:06.600' AS DateTime), CAST(N'2021-07-03T00:00:17.713' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (134, 278, 0, 0, CAST(N'2021-07-02T21:20:24.357' AS DateTime), CAST(N'2021-07-02T21:20:24.580' AS DateTime), CAST(N'2021-07-05T18:00:18.213' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (135, 3254, 0, 0, CAST(N'2021-07-03T00:00:01.000' AS DateTime), CAST(N'2021-07-03T00:00:17.697' AS DateTime), CAST(N'2021-07-05T07:05:04.650' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (136, 3255, 0, 0, CAST(N'2021-07-03T12:00:01.000' AS DateTime), CAST(N'2021-07-03T00:00:17.700' AS DateTime), CAST(N'2021-07-05T07:04:04.263' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (137, 3256, 0, 0, CAST(N'2021-07-05T00:00:01.000' AS DateTime), CAST(N'2021-07-05T07:04:04.213' AS DateTime), CAST(N'2021-07-06T07:04:23.643' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (138, 3257, 0, 0, CAST(N'2021-07-05T12:00:01.000' AS DateTime), CAST(N'2021-07-05T07:04:04.217' AS DateTime), CAST(N'2021-07-06T00:00:06.447' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (139, 279, 0, 0, CAST(N'2021-07-05T21:00:40.960' AS DateTime), CAST(N'2021-07-05T21:02:12.447' AS DateTime), CAST(N'2021-07-07T09:07:44.447' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (140, 3258, 0, 0, CAST(N'2021-07-06T00:00:01.000' AS DateTime), CAST(N'2021-07-06T00:00:06.437' AS DateTime), CAST(N'2021-07-07T00:00:35.443' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (141, 3259, 0, 0, CAST(N'2021-07-06T12:00:01.000' AS DateTime), CAST(N'2021-07-06T00:00:06.440' AS DateTime), CAST(N'2021-07-07T00:00:00.737' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (142, 280, 0, 0, CAST(N'2021-07-06T21:13:38.280' AS DateTime), CAST(N'2021-07-06T21:16:53.807' AS DateTime), CAST(N'2021-07-07T18:00:29.363' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (143, 3260, 0, 0, CAST(N'2021-07-07T00:00:01.000' AS DateTime), CAST(N'2021-07-07T00:00:00.720' AS DateTime), CAST(N'2021-07-08T00:00:37.190' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (144, 3261, 0, 0, CAST(N'2021-07-07T12:00:01.000' AS DateTime), CAST(N'2021-07-07T00:00:00.723' AS DateTime), CAST(N'2021-07-08T00:00:07.260' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (145, 281, 0, 0, CAST(N'2021-07-07T19:16:15.723' AS DateTime), CAST(N'2021-07-07T19:19:30.603' AS DateTime), CAST(N'2021-07-08T18:00:54.467' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (146, 3262, 0, 0, CAST(N'2021-07-08T00:00:01.000' AS DateTime), CAST(N'2021-07-08T00:00:07.247' AS DateTime), CAST(N'2021-07-09T00:00:17.697' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (147, 3263, 0, 0, CAST(N'2021-07-08T12:00:01.000' AS DateTime), CAST(N'2021-07-08T00:00:07.247' AS DateTime), CAST(N'2021-07-09T00:00:47.717' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (148, 282, 0, 0, CAST(N'2021-07-08T21:33:01.353' AS DateTime), CAST(N'2021-07-08T21:36:15.627' AS DateTime), CAST(N'2021-07-09T18:00:11.080' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (149, 3264, 0, 0, CAST(N'2021-07-09T00:00:01.000' AS DateTime), CAST(N'2021-07-09T00:00:17.683' AS DateTime), CAST(N'2021-07-10T00:00:11.067' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (150, 3265, 0, 0, CAST(N'2021-07-09T12:00:01.000' AS DateTime), CAST(N'2021-07-09T00:00:17.683' AS DateTime), CAST(N'2021-07-10T00:00:18.123' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (151, 283, 0, 0, CAST(N'2021-07-09T20:49:29.227' AS DateTime), CAST(N'2021-07-09T20:49:29.083' AS DateTime), CAST(N'2021-07-12T08:42:27.730' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (152, 3268, 0, 0, CAST(N'2021-07-10T12:00:01.000' AS DateTime), CAST(N'2021-07-10T00:00:11.050' AS DateTime), CAST(N'2021-07-10T08:53:52.617' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (153, 3267, 0, 0, CAST(N'2021-07-10T00:00:01.000' AS DateTime), CAST(N'2021-07-10T00:00:11.050' AS DateTime), CAST(N'2021-07-11T07:06:07.687' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (154, 3269, 0, 0, CAST(N'2021-07-11T00:00:01.000' AS DateTime), CAST(N'2021-07-11T07:06:07.637' AS DateTime), CAST(N'2021-07-12T07:06:10.233' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (155, 3270, 0, 0, CAST(N'2021-07-11T12:00:01.000' AS DateTime), CAST(N'2021-07-11T07:06:07.640' AS DateTime), CAST(N'2021-07-12T00:00:36.007' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (156, 3271, 0, 0, CAST(N'2021-07-12T00:00:01.000' AS DateTime), CAST(N'2021-07-12T00:00:35.990' AS DateTime), CAST(N'2021-07-13T00:00:47.600' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (157, 3272, 0, 0, CAST(N'2021-07-12T12:00:01.000' AS DateTime), CAST(N'2021-07-12T00:00:35.993' AS DateTime), CAST(N'2021-07-13T00:00:17.327' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (158, 284, 0, 0, CAST(N'2021-07-12T08:42:58.947' AS DateTime), CAST(N'2021-07-12T08:42:58.867' AS DateTime), CAST(N'2021-07-26T10:44:06.300' AS DateTime), 1, N'jbpadao', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (159, 3273, 0, 0, CAST(N'2021-07-13T00:00:01.000' AS DateTime), CAST(N'2021-07-13T00:00:17.310' AS DateTime), CAST(N'2021-07-14T00:01:03.753' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (160, 3274, 0, 0, CAST(N'2021-07-13T12:00:01.000' AS DateTime), CAST(N'2021-07-13T00:00:17.313' AS DateTime), CAST(N'2021-07-14T00:00:33.730' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (161, 3275, 0, 0, CAST(N'2021-07-14T00:00:01.000' AS DateTime), CAST(N'2021-07-14T00:00:33.717' AS DateTime), CAST(N'2021-07-15T00:01:07.333' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (162, 3276, 0, 0, CAST(N'2021-07-14T12:00:01.000' AS DateTime), CAST(N'2021-07-14T00:00:33.720' AS DateTime), CAST(N'2021-07-15T00:00:25.653' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (163, 285, 0, 0, CAST(N'2021-07-14T05:45:16.923' AS DateTime), CAST(N'2021-07-14T05:45:17.103' AS DateTime), CAST(N'2021-07-26T10:44:04.323' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (164, 3277, 0, 0, CAST(N'2021-07-15T00:00:01.000' AS DateTime), CAST(N'2021-07-15T00:00:25.640' AS DateTime), CAST(N'2021-07-16T00:00:51.433' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (165, 3278, 0, 0, CAST(N'2021-07-15T12:00:01.000' AS DateTime), CAST(N'2021-07-15T00:00:25.643' AS DateTime), CAST(N'2021-07-16T00:00:21.407' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (166, 3281, 0, 0, CAST(N'2021-07-16T12:00:01.000' AS DateTime), CAST(N'2021-07-16T00:00:21.397' AS DateTime), CAST(N'2021-07-17T00:00:05.290' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (167, 3280, 0, 0, CAST(N'2021-07-16T00:00:01.000' AS DateTime), CAST(N'2021-07-16T00:00:21.397' AS DateTime), CAST(N'2021-07-17T00:00:35.300' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (168, 286, 0, 0, CAST(N'2021-07-16T06:47:38.090' AS DateTime), CAST(N'2021-07-16T06:47:38.000' AS DateTime), CAST(N'2021-07-26T10:43:54.870' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (169, 3282, 0, 0, CAST(N'2021-07-17T00:00:01.000' AS DateTime), CAST(N'2021-07-17T00:00:05.277' AS DateTime), CAST(N'2021-07-18T07:19:57.847' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (170, 3283, 0, 0, CAST(N'2021-07-17T12:00:01.000' AS DateTime), CAST(N'2021-07-17T00:00:05.280' AS DateTime), CAST(N'2021-07-17T00:00:05.280' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (171, 287, 0, 0, CAST(N'2021-07-17T05:34:50.847' AS DateTime), CAST(N'2021-07-17T05:34:51.083' AS DateTime), CAST(N'2021-07-26T10:43:50.277' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (172, 3284, 0, 0, CAST(N'2021-07-18T00:00:01.000' AS DateTime), CAST(N'2021-07-18T07:19:57.793' AS DateTime), CAST(N'2021-07-19T07:20:02.327' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (173, 3285, 0, 0, CAST(N'2021-07-18T12:00:01.000' AS DateTime), CAST(N'2021-07-18T07:19:57.797' AS DateTime), CAST(N'2021-07-19T00:00:33.477' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (174, 288, 0, 0, CAST(N'2021-07-18T21:32:50.953' AS DateTime), CAST(N'2021-07-18T21:32:50.427' AS DateTime), CAST(N'2021-07-26T10:43:48.070' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (175, 3286, 0, 0, CAST(N'2021-07-19T00:00:01.000' AS DateTime), CAST(N'2021-07-19T00:00:33.463' AS DateTime), CAST(N'2021-07-20T00:00:35.480' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (176, 3287, 0, 0, CAST(N'2021-07-19T12:00:01.000' AS DateTime), CAST(N'2021-07-19T00:00:33.467' AS DateTime), CAST(N'2021-07-20T00:00:05.483' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (177, 289, 0, 0, CAST(N'2021-07-19T21:16:25.700' AS DateTime), CAST(N'2021-07-19T21:16:24.310' AS DateTime), CAST(N'2021-07-26T10:43:46.197' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (178, 3288, 0, 0, CAST(N'2021-07-20T00:00:01.000' AS DateTime), CAST(N'2021-07-20T00:00:05.467' AS DateTime), CAST(N'2021-07-21T00:00:32.740' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (179, 3289, 0, 0, CAST(N'2021-07-20T12:00:01.000' AS DateTime), CAST(N'2021-07-20T00:00:05.473' AS DateTime), CAST(N'2021-07-21T00:00:06.863' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (180, 290, 0, 0, CAST(N'2021-07-20T21:24:08.217' AS DateTime), CAST(N'2021-07-20T21:24:06.023' AS DateTime), CAST(N'2021-07-26T10:43:36.180' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (181, 3290, 0, 0, CAST(N'2021-07-21T00:00:01.000' AS DateTime), CAST(N'2021-07-21T00:00:06.853' AS DateTime), CAST(N'2021-07-22T00:00:24.577' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (182, 3291, 0, 0, CAST(N'2021-07-21T12:00:01.000' AS DateTime), CAST(N'2021-07-21T00:00:06.853' AS DateTime), CAST(N'2021-07-22T00:00:54.623' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (183, 3292, 0, 0, CAST(N'2021-07-22T00:00:01.000' AS DateTime), CAST(N'2021-07-22T00:00:24.560' AS DateTime), CAST(N'2021-07-23T00:00:32.143' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (184, 3293, 0, 0, CAST(N'2021-07-22T12:00:01.000' AS DateTime), CAST(N'2021-07-22T00:00:24.563' AS DateTime), CAST(N'2021-07-23T00:00:02.263' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (185, 291, 0, 0, CAST(N'2021-07-22T06:00:54.460' AS DateTime), CAST(N'2021-07-22T06:00:51.630' AS DateTime), CAST(N'2021-07-26T10:43:34.087' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (186, 3294, 0, 0, CAST(N'2021-07-23T00:00:01.000' AS DateTime), CAST(N'2021-07-23T00:00:02.243' AS DateTime), CAST(N'2021-07-24T00:00:32.980' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (187, 3295, 0, 0, CAST(N'2021-07-23T12:00:01.000' AS DateTime), CAST(N'2021-07-23T00:00:02.247' AS DateTime), CAST(N'2021-07-24T00:00:03.050' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (188, 292, 0, 0, CAST(N'2021-07-23T09:01:48.677' AS DateTime), CAST(N'2021-07-23T09:01:45.120' AS DateTime), CAST(N'2021-07-23T18:51:39.643' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (189, 293, 0, 0, CAST(N'2021-07-23T19:23:59.037' AS DateTime), CAST(N'2021-07-23T19:23:55.197' AS DateTime), CAST(N'2021-07-26T10:43:00.817' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (190, 3296, 0, 0, CAST(N'2021-07-24T00:00:01.000' AS DateTime), CAST(N'2021-07-24T00:00:03.037' AS DateTime), CAST(N'2021-07-25T07:09:03.700' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (191, 3297, 0, 0, CAST(N'2021-07-24T12:00:01.000' AS DateTime), CAST(N'2021-07-24T00:00:03.040' AS DateTime), CAST(N'2021-07-25T07:08:33.717' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (192, 3298, 0, 0, CAST(N'2021-07-25T00:00:01.000' AS DateTime), CAST(N'2021-07-25T07:08:33.670' AS DateTime), CAST(N'2021-07-26T07:08:41.763' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (193, 3299, 0, 0, CAST(N'2021-07-25T12:00:01.000' AS DateTime), CAST(N'2021-07-25T07:08:33.673' AS DateTime), CAST(N'2021-07-26T00:00:23.233' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (194, 294, 0, 0, CAST(N'2021-07-25T20:08:29.577' AS DateTime), CAST(N'2021-07-25T20:08:23.493' AS DateTime), CAST(N'2021-07-26T10:42:57.607' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (195, 3300, 0, 0, CAST(N'2021-07-26T00:00:01.000' AS DateTime), CAST(N'2021-07-26T00:00:23.223' AS DateTime), CAST(N'2021-07-27T00:00:34.377' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (196, 3301, 0, 0, CAST(N'2021-07-26T12:00:01.000' AS DateTime), CAST(N'2021-07-26T00:00:23.227' AS DateTime), CAST(N'2021-07-27T00:00:04.380' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (197, 295, 0, 0, CAST(N'2021-07-26T07:21:51.457' AS DateTime), CAST(N'2021-07-26T07:21:44.467' AS DateTime), CAST(N'2021-07-26T18:00:11.667' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (198, 296, 0, 0, CAST(N'2021-07-26T20:53:55.537' AS DateTime), CAST(N'2021-07-26T20:53:48.987' AS DateTime), CAST(N'2021-07-30T07:30:23.500' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (199, 3302, 0, 0, CAST(N'2021-07-27T00:00:01.000' AS DateTime), CAST(N'2021-07-27T00:00:04.367' AS DateTime), CAST(N'2021-07-28T00:02:00.607' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (200, 3303, 0, 0, CAST(N'2021-07-27T12:00:01.000' AS DateTime), CAST(N'2021-07-27T00:00:04.370' AS DateTime), CAST(N'2021-07-28T00:00:59.433' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (201, 297, 0, 0, CAST(N'2021-07-27T21:40:45.133' AS DateTime), CAST(N'2021-07-27T21:40:34.443' AS DateTime), CAST(N'2021-07-30T07:30:18.903' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (202, 3304, 0, 0, CAST(N'2021-07-28T00:00:01.000' AS DateTime), CAST(N'2021-07-28T00:00:59.420' AS DateTime), CAST(N'2021-07-29T00:02:10.480' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (203, 3305, 0, 0, CAST(N'2021-07-28T12:00:01.000' AS DateTime), CAST(N'2021-07-28T00:00:59.427' AS DateTime), CAST(N'2021-07-29T00:01:40.697' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (204, 298, 0, 0, CAST(N'2021-07-28T20:04:26.690' AS DateTime), CAST(N'2021-07-28T20:04:13.910' AS DateTime), CAST(N'2021-07-30T18:00:10.377' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (205, 3306, 0, 0, CAST(N'2021-07-29T00:00:01.000' AS DateTime), CAST(N'2021-07-29T00:01:40.677' AS DateTime), CAST(N'2021-07-30T06:45:07.480' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (206, 3307, 0, 0, CAST(N'2021-07-29T12:00:01.000' AS DateTime), CAST(N'2021-07-29T00:01:40.683' AS DateTime), CAST(N'2021-07-30T06:44:23.960' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (207, 3308, 0, 0, CAST(N'2021-07-30T00:00:01.000' AS DateTime), CAST(N'2021-07-30T06:44:23.947' AS DateTime), CAST(N'2021-07-31T06:44:35.357' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (208, 3309, 0, 0, CAST(N'2021-07-30T12:00:01.000' AS DateTime), CAST(N'2021-07-30T06:44:23.950' AS DateTime), CAST(N'2021-07-31T00:00:27.820' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (209, 3310, 0, 0, CAST(N'2021-07-31T00:00:01.000' AS DateTime), CAST(N'2021-07-31T00:00:27.810' AS DateTime), CAST(N'2021-08-01T08:00:59.433' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (210, 3311, 0, 0, CAST(N'2021-07-31T12:00:01.000' AS DateTime), CAST(N'2021-07-31T00:00:27.813' AS DateTime), CAST(N'2021-08-01T08:00:29.547' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (211, 3312, 0, 0, CAST(N'2021-08-01T00:00:01.000' AS DateTime), CAST(N'2021-08-01T08:00:29.480' AS DateTime), CAST(N'2021-08-02T08:00:43.303' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (212, 3313, 0, 0, CAST(N'2021-08-01T12:00:01.000' AS DateTime), CAST(N'2021-08-01T08:00:29.487' AS DateTime), CAST(N'2021-08-02T00:00:09.547' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (213, 299, 0, 0, CAST(N'2021-08-01T20:22:14.523' AS DateTime), CAST(N'2021-08-01T20:21:48.627' AS DateTime), CAST(N'2021-08-02T18:59:36.407' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (214, 3314, 0, 0, CAST(N'2021-08-02T00:00:01.000' AS DateTime), CAST(N'2021-08-02T00:00:09.537' AS DateTime), CAST(N'2021-08-03T00:00:53.303' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (215, 3315, 0, 0, CAST(N'2021-08-02T12:00:01.000' AS DateTime), CAST(N'2021-08-02T00:00:09.540' AS DateTime), CAST(N'2021-08-03T00:00:23.260' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (216, 300, 0, 0, CAST(N'2021-08-02T23:04:58.723' AS DateTime), CAST(N'2021-08-02T23:04:58.840' AS DateTime), CAST(N'2021-08-03T18:00:47.397' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (217, 3316, 0, 0, CAST(N'2021-08-03T00:00:01.000' AS DateTime), CAST(N'2021-08-03T00:00:23.250' AS DateTime), CAST(N'2021-08-04T00:00:46.040' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (218, 3317, 0, 0, CAST(N'2021-08-03T12:00:01.000' AS DateTime), CAST(N'2021-08-03T00:00:23.253' AS DateTime), CAST(N'2021-08-04T00:00:29.097' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (219, 3320, 0, 0, CAST(N'2021-08-04T12:00:01.000' AS DateTime), CAST(N'2021-08-04T00:00:29.087' AS DateTime), CAST(N'2021-08-05T00:00:16.573' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (220, 3319, 0, 0, CAST(N'2021-08-04T00:00:01.000' AS DateTime), CAST(N'2021-08-04T00:00:29.087' AS DateTime), CAST(N'2021-08-05T00:00:46.603' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (221, 301, 0, 0, CAST(N'2021-08-04T06:05:21.473' AS DateTime), CAST(N'2021-08-04T06:05:21.517' AS DateTime), CAST(N'2021-08-05T16:00:17.827' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (222, 3321, 0, 0, CAST(N'2021-08-05T00:00:01.000' AS DateTime), CAST(N'2021-08-05T00:00:16.563' AS DateTime), CAST(N'2021-08-06T00:00:56.707' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (223, 3322, 0, 0, CAST(N'2021-08-05T12:00:01.000' AS DateTime), CAST(N'2021-08-05T00:00:16.567' AS DateTime), CAST(N'2021-08-06T00:00:26.703' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (224, 302, 0, 0, CAST(N'2021-08-05T00:12:54.887' AS DateTime), CAST(N'2021-08-05T00:12:54.910' AS DateTime), CAST(N'2021-08-06T07:07:21.763' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (225, 3323, 0, 0, CAST(N'2021-08-06T00:00:01.000' AS DateTime), CAST(N'2021-08-06T00:00:26.690' AS DateTime), CAST(N'2021-08-07T00:00:55.480' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (226, 3324, 0, 0, CAST(N'2021-08-06T12:00:01.000' AS DateTime), CAST(N'2021-08-06T00:00:26.693' AS DateTime), CAST(N'2021-08-07T00:00:25.867' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (227, 303, 0, 0, CAST(N'2021-08-06T07:07:09.050' AS DateTime), CAST(N'2021-08-06T07:07:09.157' AS DateTime), CAST(N'2021-08-10T08:15:57.253' AS DateTime), 1, N'jbpadao', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (228, 3325, 0, 0, CAST(N'2021-08-07T00:00:01.000' AS DateTime), CAST(N'2021-08-07T00:00:25.853' AS DateTime), CAST(N'2021-08-08T07:09:18.133' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (229, 3326, 0, 0, CAST(N'2021-08-07T12:00:01.000' AS DateTime), CAST(N'2021-08-07T00:00:25.857' AS DateTime), CAST(N'2021-08-07T00:00:25.857' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (230, 3327, 0, 0, CAST(N'2021-08-08T00:00:01.000' AS DateTime), CAST(N'2021-08-08T07:09:18.077' AS DateTime), CAST(N'2021-08-09T07:09:20.103' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (231, 3328, 0, 0, CAST(N'2021-08-08T12:00:01.000' AS DateTime), CAST(N'2021-08-08T07:09:18.080' AS DateTime), CAST(N'2021-08-09T00:00:10.277' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (232, 304, 0, 0, CAST(N'2021-08-08T19:33:08.423' AS DateTime), CAST(N'2021-08-08T19:33:08.440' AS DateTime), CAST(N'2021-08-10T08:15:36.213' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (233, 3329, 0, 0, CAST(N'2021-08-09T00:00:01.000' AS DateTime), CAST(N'2021-08-09T00:00:10.260' AS DateTime), CAST(N'2021-08-10T00:00:57.067' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (234, 3330, 0, 0, CAST(N'2021-08-09T12:00:01.000' AS DateTime), CAST(N'2021-08-09T00:00:10.263' AS DateTime), CAST(N'2021-08-10T00:00:27.217' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (235, 305, 0, 0, CAST(N'2021-08-09T20:22:12.607' AS DateTime), CAST(N'2021-08-09T20:22:13.030' AS DateTime), CAST(N'2021-08-10T18:00:33.927' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (236, 3331, 0, 0, CAST(N'2021-08-10T00:00:01.000' AS DateTime), CAST(N'2021-08-10T00:00:27.203' AS DateTime), CAST(N'2021-08-11T00:00:32.883' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (237, 3332, 0, 0, CAST(N'2021-08-10T12:00:01.000' AS DateTime), CAST(N'2021-08-10T00:00:27.207' AS DateTime), CAST(N'2021-08-11T00:00:24.953' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (238, 306, 0, 0, CAST(N'2021-08-10T19:47:43.040' AS DateTime), CAST(N'2021-08-10T19:47:43.257' AS DateTime), CAST(N'2021-08-12T07:04:51.203' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (239, 3333, 0, 0, CAST(N'2021-08-11T00:00:01.000' AS DateTime), CAST(N'2021-08-11T00:00:24.943' AS DateTime), CAST(N'2021-08-12T00:00:26.367' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (240, 3334, 0, 0, CAST(N'2021-08-11T12:00:01.000' AS DateTime), CAST(N'2021-08-11T00:00:24.943' AS DateTime), CAST(N'2021-08-12T00:00:56.313' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (241, 307, 0, 0, CAST(N'2021-08-11T19:50:54.050' AS DateTime), CAST(N'2021-08-11T19:50:53.977' AS DateTime), CAST(N'2021-08-13T08:49:35.373' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (242, 3335, 0, 0, CAST(N'2021-08-12T00:00:01.000' AS DateTime), CAST(N'2021-08-12T00:00:26.353' AS DateTime), CAST(N'2021-08-13T00:00:00.060' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (243, 3336, 0, 0, CAST(N'2021-08-12T12:00:01.000' AS DateTime), CAST(N'2021-08-12T00:00:26.353' AS DateTime), CAST(N'2021-08-13T00:00:30.030' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (244, 308, 0, 0, CAST(N'2021-08-12T19:54:39.700' AS DateTime), CAST(N'2021-08-12T19:54:39.747' AS DateTime), CAST(N'2021-08-17T07:31:08.817' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (245, 3337, 0, 0, CAST(N'2021-08-13T00:00:01.000' AS DateTime), CAST(N'2021-08-13T00:00:00.043' AS DateTime), CAST(N'2021-08-14T00:00:45.857' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (246, 3338, 0, 0, CAST(N'2021-08-13T12:00:01.000' AS DateTime), CAST(N'2021-08-13T00:00:00.047' AS DateTime), CAST(N'2021-08-14T00:00:15.720' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (247, 3339, 0, 0, CAST(N'2021-08-14T00:00:01.000' AS DateTime), CAST(N'2021-08-14T00:00:15.707' AS DateTime), CAST(N'2021-08-15T06:57:53.280' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (248, 3340, 0, 0, CAST(N'2021-08-14T12:00:01.000' AS DateTime), CAST(N'2021-08-14T00:00:15.710' AS DateTime), CAST(N'2021-08-15T06:57:23.670' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (249, 3341, 0, 0, CAST(N'2021-08-15T00:00:01.000' AS DateTime), CAST(N'2021-08-15T06:57:23.620' AS DateTime), CAST(N'2021-08-16T06:57:45.077' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (250, 3342, 0, 0, CAST(N'2021-08-15T12:00:01.000' AS DateTime), CAST(N'2021-08-15T06:57:23.623' AS DateTime), CAST(N'2021-08-16T00:00:03.857' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (251, 3343, 0, 0, CAST(N'2021-08-16T00:00:01.000' AS DateTime), CAST(N'2021-08-16T00:00:03.847' AS DateTime), CAST(N'2021-08-17T00:00:18.787' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (252, 3344, 0, 0, CAST(N'2021-08-16T12:00:01.000' AS DateTime), CAST(N'2021-08-16T00:00:03.847' AS DateTime), CAST(N'2021-08-17T00:00:48.840' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (253, 309, 0, 0, CAST(N'2021-08-16T06:26:48.003' AS DateTime), CAST(N'2021-08-16T06:26:48.020' AS DateTime), CAST(N'2021-08-16T18:00:53.147' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (254, 310, 0, 0, CAST(N'2021-08-16T21:50:27.573' AS DateTime), CAST(N'2021-08-16T21:48:32.607' AS DateTime), CAST(N'2021-08-18T13:23:58.107' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (255, 310, 0, 0, CAST(N'2021-08-16T21:50:32.427' AS DateTime), CAST(N'2021-08-16T21:48:37.463' AS DateTime), CAST(N'2021-08-17T07:30:24.723' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (256, 3345, 0, 0, CAST(N'2021-08-17T00:00:01.000' AS DateTime), CAST(N'2021-08-17T00:00:18.777' AS DateTime), CAST(N'2021-08-18T00:00:31.247' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (257, 3346, 0, 0, CAST(N'2021-08-17T12:00:01.000' AS DateTime), CAST(N'2021-08-17T00:00:18.777' AS DateTime), CAST(N'2021-08-18T00:01:31.693' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (258, 3347, 0, 0, CAST(N'2021-08-18T00:00:01.000' AS DateTime), CAST(N'2021-08-18T00:00:31.237' AS DateTime), CAST(N'2021-08-19T00:00:46.750' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (259, 3348, 0, 0, CAST(N'2021-08-18T12:00:01.000' AS DateTime), CAST(N'2021-08-18T00:00:31.237' AS DateTime), CAST(N'2021-08-19T00:01:16.800' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (260, 311, 0, 0, CAST(N'2021-08-18T06:20:20.970' AS DateTime), CAST(N'2021-08-18T06:18:14.900' AS DateTime), CAST(N'2021-08-19T15:10:56.133' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (261, 3349, 0, 0, CAST(N'2021-08-19T00:00:01.000' AS DateTime), CAST(N'2021-08-19T00:00:46.727' AS DateTime), CAST(N'2021-08-20T00:00:22.280' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (262, 3350, 0, 0, CAST(N'2021-08-19T12:00:01.000' AS DateTime), CAST(N'2021-08-19T00:00:46.727' AS DateTime), CAST(N'2021-08-20T00:00:51.603' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (263, 312, 0, 0, CAST(N'2021-08-19T00:05:14.610' AS DateTime), CAST(N'2021-08-19T00:03:02.733' AS DateTime), CAST(N'2021-08-20T13:03:03.350' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (264, 3351, 0, 0, CAST(N'2021-08-20T00:00:01.000' AS DateTime), CAST(N'2021-08-20T00:00:22.260' AS DateTime), CAST(N'2021-08-21T00:00:36.273' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (265, 3352, 0, 0, CAST(N'2021-08-20T12:00:01.000' AS DateTime), CAST(N'2021-08-20T00:00:22.263' AS DateTime), CAST(N'2021-08-21T00:00:06.367' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (266, 313, 0, 0, CAST(N'2021-08-20T05:47:16.333' AS DateTime), CAST(N'2021-08-20T05:44:54.343' AS DateTime), CAST(N'2021-08-25T07:16:39.977' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (267, 314, 0, 0, CAST(N'2021-08-20T22:08:11.467' AS DateTime), CAST(N'2021-08-20T22:05:43.860' AS DateTime), CAST(N'2021-08-25T07:16:36.793' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (268, 3353, 0, 0, CAST(N'2021-08-21T00:00:01.000' AS DateTime), CAST(N'2021-08-21T00:00:06.337' AS DateTime), CAST(N'2021-08-22T07:33:55.837' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (269, 3354, 0, 0, CAST(N'2021-08-21T12:00:01.000' AS DateTime), CAST(N'2021-08-21T00:00:06.340' AS DateTime), CAST(N'2021-08-21T00:00:06.340' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (270, 3355, 0, 0, CAST(N'2021-08-22T00:00:01.000' AS DateTime), CAST(N'2021-08-22T07:33:55.787' AS DateTime), CAST(N'2021-08-23T00:00:22.367' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (271, 3356, 0, 0, CAST(N'2021-08-22T12:00:01.000' AS DateTime), CAST(N'2021-08-22T07:33:55.787' AS DateTime), CAST(N'2021-08-23T07:34:17.267' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (272, 315, 0, 0, CAST(N'2021-08-22T19:45:28.400' AS DateTime), CAST(N'2021-08-22T19:42:43.180' AS DateTime), CAST(N'2021-08-25T07:16:28.120' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (273, 3357, 0, 0, CAST(N'2021-08-23T00:00:01.000' AS DateTime), CAST(N'2021-08-23T00:00:22.347' AS DateTime), CAST(N'2021-08-24T00:00:36.823' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (274, 3358, 0, 0, CAST(N'2021-08-23T12:00:01.000' AS DateTime), CAST(N'2021-08-23T00:00:22.357' AS DateTime), CAST(N'2021-08-24T00:00:28.543' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (275, 316, 0, 0, CAST(N'2021-08-23T20:05:20.477' AS DateTime), CAST(N'2021-08-23T20:02:25.427' AS DateTime), CAST(N'2021-08-25T07:16:27.877' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (276, 3359, 0, 0, CAST(N'2021-08-24T00:00:01.000' AS DateTime), CAST(N'2021-08-24T00:00:28.530' AS DateTime), CAST(N'2021-08-25T00:00:02.010' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (277, 3360, 0, 0, CAST(N'2021-08-24T12:00:01.000' AS DateTime), CAST(N'2021-08-24T00:00:28.530' AS DateTime), CAST(N'2021-08-25T00:00:32.060' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (278, 317, 0, 0, CAST(N'2021-08-24T20:18:35.170' AS DateTime), CAST(N'2021-08-24T20:15:30.980' AS DateTime), CAST(N'2021-08-27T08:30:25.237' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (279, 3361, 0, 0, CAST(N'2021-08-25T00:00:01.000' AS DateTime), CAST(N'2021-08-25T00:00:01.997' AS DateTime), CAST(N'2021-08-26T00:00:40.627' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (280, 3362, 0, 0, CAST(N'2021-08-25T12:00:01.000' AS DateTime), CAST(N'2021-08-25T00:00:02.000' AS DateTime), CAST(N'2021-08-26T00:00:25.693' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (281, 318, 0, 0, CAST(N'2021-08-25T21:51:05.903' AS DateTime), CAST(N'2021-08-25T21:47:53.333' AS DateTime), CAST(N'2021-08-26T18:00:23.243' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (282, 3363, 0, 0, CAST(N'2021-08-26T00:00:01.000' AS DateTime), CAST(N'2021-08-26T00:00:25.680' AS DateTime), CAST(N'2021-08-27T00:00:44.777' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (283, 3364, 0, 0, CAST(N'2021-08-26T12:00:01.000' AS DateTime), CAST(N'2021-08-26T00:00:25.687' AS DateTime), CAST(N'2021-08-27T00:00:14.853' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (284, 318, 0, 0, CAST(N'2021-08-26T21:05:22.260' AS DateTime), CAST(N'2021-08-26T21:02:02.473' AS DateTime), CAST(N'2021-08-27T18:00:07.783' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (285, 3365, 0, 0, CAST(N'2021-08-27T00:00:01.000' AS DateTime), CAST(N'2021-08-27T00:00:14.843' AS DateTime), CAST(N'2021-08-28T00:00:27.400' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (286, 3366, 0, 0, CAST(N'2021-08-27T12:00:01.000' AS DateTime), CAST(N'2021-08-27T00:00:14.847' AS DateTime), CAST(N'2021-08-28T00:00:11.217' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (287, 319, 0, 0, CAST(N'2021-08-27T21:38:00.000' AS DateTime), CAST(N'2021-08-27T21:34:25.787' AS DateTime), CAST(N'2021-08-31T14:58:47.277' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (288, 3367, 0, 0, CAST(N'2021-08-28T00:00:01.000' AS DateTime), CAST(N'2021-08-28T00:00:11.207' AS DateTime), CAST(N'2021-08-28T12:00:50.900' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (289, 3368, 0, 0, CAST(N'2021-08-28T12:00:01.000' AS DateTime), CAST(N'2021-08-28T00:00:11.210' AS DateTime), CAST(N'2021-08-29T22:57:25.390' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (290, 3369, 0, 0, CAST(N'2021-08-29T00:00:01.000' AS DateTime), CAST(N'2021-08-29T22:57:25.393' AS DateTime), CAST(N'2021-08-30T07:02:39.603' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (291, 3370, 0, 0, CAST(N'2021-08-29T12:00:01.000' AS DateTime), CAST(N'2021-08-29T22:57:25.397' AS DateTime), CAST(N'2021-08-30T00:00:17.440' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (292, 3371, 0, 0, CAST(N'2021-08-30T00:00:01.000' AS DateTime), CAST(N'2021-08-30T00:00:17.430' AS DateTime), CAST(N'2021-08-31T00:00:33.487' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (293, 3372, 0, 0, CAST(N'2021-08-30T12:00:01.000' AS DateTime), CAST(N'2021-08-30T00:00:17.433' AS DateTime), CAST(N'2021-08-31T00:00:03.537' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (294, 3373, 0, 0, CAST(N'2021-08-31T00:00:01.000' AS DateTime), CAST(N'2021-08-31T00:00:03.527' AS DateTime), CAST(N'2021-09-01T00:00:23.777' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (295, 3374, 0, 0, CAST(N'2021-08-31T12:00:01.000' AS DateTime), CAST(N'2021-08-31T00:00:03.527' AS DateTime), CAST(N'2021-09-01T00:00:53.720' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (296, 320, 0, 0, CAST(N'2021-08-31T06:18:18.423' AS DateTime), CAST(N'2021-08-31T06:14:16.577' AS DateTime), CAST(N'2021-09-02T13:23:06.290' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (297, 3375, 0, 0, CAST(N'2021-09-01T00:00:01.000' AS DateTime), CAST(N'2021-09-01T00:00:23.763' AS DateTime), CAST(N'2021-09-02T00:00:49.577' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (298, 3376, 0, 0, CAST(N'2021-09-01T12:00:01.000' AS DateTime), CAST(N'2021-09-01T00:00:23.767' AS DateTime), CAST(N'2021-09-02T00:00:19.647' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (299, 321, 0, 0, CAST(N'2021-09-01T05:57:35.470' AS DateTime), CAST(N'2021-09-01T05:57:36.350' AS DateTime), CAST(N'2021-09-02T13:23:04.217' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (300, 3377, 0, 0, CAST(N'2021-09-02T00:00:01.000' AS DateTime), CAST(N'2021-09-02T00:00:19.637' AS DateTime), CAST(N'2021-09-03T00:00:53.843' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (301, 3378, 0, 0, CAST(N'2021-09-02T12:00:01.000' AS DateTime), CAST(N'2021-09-02T00:00:19.640' AS DateTime), CAST(N'2021-09-03T00:00:23.820' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (302, 322, 0, 0, CAST(N'2021-09-02T05:50:36.707' AS DateTime), CAST(N'2021-09-02T05:50:37.627' AS DateTime), CAST(N'2021-09-02T18:00:24.817' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (303, 323, 0, 0, CAST(N'2021-09-02T23:08:12.780' AS DateTime), CAST(N'2021-09-02T23:08:13.493' AS DateTime), CAST(N'2021-09-04T07:00:56.047' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (304, 3379, 0, 0, CAST(N'2021-09-03T00:00:01.000' AS DateTime), CAST(N'2021-09-03T00:00:23.807' AS DateTime), CAST(N'2021-09-04T00:00:43.643' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (305, 3380, 0, 0, CAST(N'2021-09-03T12:00:01.000' AS DateTime), CAST(N'2021-09-03T00:00:23.810' AS DateTime), CAST(N'2021-09-04T00:00:13.657' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (306, 324, 0, 0, CAST(N'2021-09-03T23:46:27.303' AS DateTime), CAST(N'2021-09-03T23:46:28.203' AS DateTime), CAST(N'2021-09-07T07:02:08.890' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (307, 3381, 0, 0, CAST(N'2021-09-04T00:00:01.000' AS DateTime), CAST(N'2021-09-04T00:00:13.643' AS DateTime), CAST(N'2021-09-05T07:00:31.850' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (308, 3382, 0, 0, CAST(N'2021-09-04T12:00:01.000' AS DateTime), CAST(N'2021-09-04T00:00:13.647' AS DateTime), CAST(N'2021-09-05T07:00:02.003' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (309, 3383, 0, 0, CAST(N'2021-09-05T00:00:01.000' AS DateTime), CAST(N'2021-09-05T07:00:01.947' AS DateTime), CAST(N'2021-09-06T07:00:02.617' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (310, 3384, 0, 0, CAST(N'2021-09-05T12:00:01.000' AS DateTime), CAST(N'2021-09-05T07:00:01.950' AS DateTime), CAST(N'2021-09-06T00:00:29.533' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (311, 325, 0, 0, CAST(N'2021-09-05T19:37:04.393' AS DateTime), CAST(N'2021-09-05T19:37:05.380' AS DateTime), CAST(N'2021-09-06T18:00:24.757' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (312, 3385, 0, 0, CAST(N'2021-09-06T00:00:01.000' AS DateTime), CAST(N'2021-09-06T00:00:29.523' AS DateTime), CAST(N'2021-09-07T00:00:56.700' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (313, 3386, 0, 0, CAST(N'2021-09-06T12:00:01.000' AS DateTime), CAST(N'2021-09-06T00:00:29.527' AS DateTime), CAST(N'2021-09-07T09:15:52.383' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (314, 326, 0, 0, CAST(N'2021-09-06T20:29:23.627' AS DateTime), CAST(N'2021-09-06T20:29:24.330' AS DateTime), CAST(N'2021-09-07T18:00:34.710' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (315, 3387, 0, 0, CAST(N'2021-09-07T00:00:01.000' AS DateTime), CAST(N'2021-09-07T00:00:26.750' AS DateTime), CAST(N'2021-09-08T00:00:34.770' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (316, 3388, 0, 0, CAST(N'2021-09-07T12:00:01.000' AS DateTime), CAST(N'2021-09-07T00:00:26.753' AS DateTime), CAST(N'2021-09-08T00:00:18.073' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (317, 327, 0, 0, CAST(N'2021-09-07T21:19:32.340' AS DateTime), CAST(N'2021-09-07T21:19:32.790' AS DateTime), CAST(N'2021-09-09T09:37:03.547' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (318, 3389, 0, 0, CAST(N'2021-09-08T00:00:01.000' AS DateTime), CAST(N'2021-09-08T00:00:18.057' AS DateTime), CAST(N'2021-09-09T00:00:46.020' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (319, 3390, 0, 0, CAST(N'2021-09-08T12:00:01.000' AS DateTime), CAST(N'2021-09-08T00:00:18.063' AS DateTime), CAST(N'2021-09-09T00:00:16.057' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (320, 328, 0, 0, CAST(N'2021-09-08T20:44:51.650' AS DateTime), CAST(N'2021-09-08T20:44:52.727' AS DateTime), CAST(N'2021-09-10T07:37:25.557' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (321, 3391, 0, 0, CAST(N'2021-09-09T00:00:01.000' AS DateTime), CAST(N'2021-09-09T00:00:16.043' AS DateTime), CAST(N'2021-09-10T00:00:24.960' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (322, 3392, 0, 0, CAST(N'2021-09-09T12:00:01.000' AS DateTime), CAST(N'2021-09-09T00:00:16.043' AS DateTime), CAST(N'2021-09-10T00:01:47.847' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (323, 329, 0, 0, CAST(N'2021-09-09T21:17:44.780' AS DateTime), CAST(N'2021-09-09T21:17:45.533' AS DateTime), CAST(N'2021-09-10T18:00:20.107' AS DateTime), 1, N'jclaroa', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (324, 3393, 0, 0, CAST(N'2021-09-10T00:00:01.000' AS DateTime), CAST(N'2021-09-10T00:00:24.940' AS DateTime), CAST(N'2021-09-11T00:00:42.557' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (325, 3394, 0, 0, CAST(N'2021-09-10T12:00:01.000' AS DateTime), CAST(N'2021-09-10T00:00:24.947' AS DateTime), CAST(N'2021-09-11T00:00:12.750' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (326, 330, 0, 0, CAST(N'2021-09-10T21:11:27.520' AS DateTime), CAST(N'2021-09-10T21:11:27.910' AS DateTime), CAST(N'2021-09-14T09:08:29.690' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (327, 3395, 0, 0, CAST(N'2021-09-11T00:00:01.000' AS DateTime), CAST(N'2021-09-11T00:00:12.740' AS DateTime), CAST(N'2021-09-12T07:27:17.137' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (328, 3396, 0, 0, CAST(N'2021-09-11T12:00:01.000' AS DateTime), CAST(N'2021-09-11T00:00:12.740' AS DateTime), CAST(N'2021-09-12T07:27:47.040' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (329, 3397, 0, 0, CAST(N'2021-09-12T00:00:01.000' AS DateTime), CAST(N'2021-09-12T07:27:17.073' AS DateTime), CAST(N'2021-09-13T07:27:20.550' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (330, 3398, 0, 0, CAST(N'2021-09-12T12:00:01.000' AS DateTime), CAST(N'2021-09-12T07:27:17.077' AS DateTime), CAST(N'2021-09-13T00:00:35.620' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (331, 3399, 0, 0, CAST(N'2021-09-13T00:00:01.000' AS DateTime), CAST(N'2021-09-13T00:00:35.607' AS DateTime), CAST(N'2021-09-14T00:00:19.340' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (332, 3400, 0, 0, CAST(N'2021-09-13T12:00:01.000' AS DateTime), CAST(N'2021-09-13T00:00:35.607' AS DateTime), CAST(N'2021-09-14T00:01:22.090' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (333, 3401, 0, 0, CAST(N'2021-09-14T00:00:01.000' AS DateTime), CAST(N'2021-09-14T00:00:19.330' AS DateTime), CAST(N'2021-09-15T00:00:35.443' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (334, 3402, 0, 0, CAST(N'2021-09-14T12:00:01.000' AS DateTime), CAST(N'2021-09-14T00:00:19.333' AS DateTime), CAST(N'2021-09-15T00:00:05.487' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (335, 331, 0, 0, CAST(N'2021-09-14T08:34:08.373' AS DateTime), CAST(N'2021-09-14T08:34:08.593' AS DateTime), CAST(N'2021-09-14T18:00:32.063' AS DateTime), 1, N'jclaroa', N'jbpadao')
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (336, 3403, 0, 0, CAST(N'2021-09-15T00:00:01.000' AS DateTime), CAST(N'2021-09-15T00:00:05.470' AS DateTime), CAST(N'2021-09-16T00:00:42.713' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (337, 3404, 0, 0, CAST(N'2021-09-15T12:00:01.000' AS DateTime), CAST(N'2021-09-15T00:00:05.473' AS DateTime), CAST(N'2021-09-16T00:00:12.740' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (338, 331, 0, 0, CAST(N'2021-09-15T06:19:19.507' AS DateTime), CAST(N'2021-09-15T06:19:19.967' AS DateTime), CAST(N'2021-09-17T08:08:40.227' AS DateTime), 1, N'khdiagan', N'jbpadao')
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (339, 3405, 0, 0, CAST(N'2021-09-16T00:00:01.000' AS DateTime), CAST(N'2021-09-16T00:00:12.727' AS DateTime), CAST(N'2021-09-17T00:00:34.040' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (340, 3406, 0, 0, CAST(N'2021-09-16T12:00:01.000' AS DateTime), CAST(N'2021-09-16T00:00:12.730' AS DateTime), CAST(N'2021-09-17T00:00:04.060' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (341, 332, 0, 0, CAST(N'2021-09-16T05:38:53.800' AS DateTime), CAST(N'2021-09-16T05:38:53.973' AS DateTime), CAST(N'2021-09-21T07:04:37.643' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (342, 3407, 0, 0, CAST(N'2021-09-17T00:00:01.000' AS DateTime), CAST(N'2021-09-17T00:00:04.047' AS DateTime), CAST(N'2021-09-18T00:00:30.253' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (343, 3408, 0, 0, CAST(N'2021-09-17T12:00:01.000' AS DateTime), CAST(N'2021-09-17T00:00:04.050' AS DateTime), CAST(N'2021-09-18T00:00:00.553' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (344, 333, 0, 0, CAST(N'2021-09-17T23:06:07.993' AS DateTime), CAST(N'2021-09-17T23:06:08.463' AS DateTime), CAST(N'2021-09-19T18:00:09.040' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (345, 3409, 0, 0, CAST(N'2021-09-18T00:00:01.000' AS DateTime), CAST(N'2021-09-18T00:00:00.540' AS DateTime), CAST(N'2021-09-19T06:44:51.380' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (346, 3410, 0, 0, CAST(N'2021-09-18T12:00:01.000' AS DateTime), CAST(N'2021-09-18T00:00:00.543' AS DateTime), CAST(N'2021-09-19T06:43:54.880' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (347, 3411, 0, 0, CAST(N'2021-09-19T00:00:01.000' AS DateTime), CAST(N'2021-09-19T06:43:54.830' AS DateTime), CAST(N'2021-09-20T06:51:10.737' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (348, 3412, 0, 0, CAST(N'2021-09-19T12:00:01.000' AS DateTime), CAST(N'2021-09-19T06:43:54.833' AS DateTime), CAST(N'2021-09-20T06:50:40.790' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (349, 333, 0, 0, CAST(N'2021-09-20T06:50:00.550' AS DateTime), CAST(N'2021-09-20T06:50:01.037' AS DateTime), CAST(N'2021-09-21T07:04:30.087' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (350, 3413, 0, 0, CAST(N'2021-09-20T00:00:01.000' AS DateTime), CAST(N'2021-09-20T06:50:40.743' AS DateTime), CAST(N'2021-09-21T00:00:50.043' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (351, 3414, 0, 0, CAST(N'2021-09-20T12:00:01.000' AS DateTime), CAST(N'2021-09-20T06:50:40.743' AS DateTime), CAST(N'2021-09-21T06:50:54.817' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (352, 3415, 0, 0, CAST(N'2021-09-21T00:00:01.000' AS DateTime), CAST(N'2021-09-21T00:00:50.033' AS DateTime), CAST(N'2021-09-22T00:01:02.660' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (353, 3416, 0, 0, CAST(N'2021-09-21T12:00:01.000' AS DateTime), CAST(N'2021-09-21T00:00:50.033' AS DateTime), CAST(N'2021-09-22T00:01:32.710' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (354, 334, 0, 0, CAST(N'2021-09-21T05:53:33.120' AS DateTime), CAST(N'2021-09-21T05:53:33.277' AS DateTime), CAST(N'2021-09-24T06:35:47.310' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (355, 3417, 0, 0, CAST(N'2021-09-22T00:00:01.000' AS DateTime), CAST(N'2021-09-22T00:01:02.643' AS DateTime), CAST(N'2021-09-23T00:01:18.007' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (356, 3418, 0, 0, CAST(N'2021-09-22T12:00:01.000' AS DateTime), CAST(N'2021-09-22T00:01:02.647' AS DateTime), CAST(N'2021-09-23T00:00:17.957' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (357, 335, 0, 0, CAST(N'2021-09-22T05:59:23.117' AS DateTime), CAST(N'2021-09-22T05:59:23.187' AS DateTime), CAST(N'2021-09-24T06:35:48.703' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (358, 3419, 0, 0, CAST(N'2021-09-23T00:00:01.000' AS DateTime), CAST(N'2021-09-23T00:00:17.947' AS DateTime), CAST(N'2021-09-24T00:00:31.417' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (359, 3420, 0, 0, CAST(N'2021-09-23T12:00:01.000' AS DateTime), CAST(N'2021-09-23T00:00:17.947' AS DateTime), CAST(N'2021-09-24T00:01:01.427' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (360, 3421, 0, 0, CAST(N'2021-09-24T00:00:01.000' AS DateTime), CAST(N'2021-09-24T00:00:31.397' AS DateTime), CAST(N'2021-09-25T00:00:59.087' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (361, 3422, 0, 0, CAST(N'2021-09-24T12:00:01.000' AS DateTime), CAST(N'2021-09-24T00:00:31.400' AS DateTime), CAST(N'2021-09-25T00:00:29.140' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (362, 336, 0, 0, CAST(N'2021-09-24T05:36:07.910' AS DateTime), CAST(N'2021-09-24T05:36:08.007' AS DateTime), CAST(N'2021-09-27T14:38:19.597' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (363, 337, 0, 0, CAST(N'2021-09-24T23:33:39.523' AS DateTime), CAST(N'2021-09-24T23:33:39.607' AS DateTime), CAST(N'2021-09-27T14:38:22.263' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (364, 3423, 0, 0, CAST(N'2021-09-25T00:00:01.000' AS DateTime), CAST(N'2021-09-25T00:00:29.127' AS DateTime), CAST(N'2021-09-25T12:00:19.320' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (365, 3424, 0, 0, CAST(N'2021-09-25T12:00:01.000' AS DateTime), CAST(N'2021-09-25T00:00:29.130' AS DateTime), CAST(N'2021-09-26T21:00:05.670' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (366, 338, 0, 0, CAST(N'2021-09-26T20:59:30.703' AS DateTime), CAST(N'2021-09-26T20:59:30.707' AS DateTime), CAST(N'2021-09-30T08:59:50.497' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (367, 3425, 0, 0, CAST(N'2021-09-26T00:00:01.000' AS DateTime), CAST(N'2021-09-26T21:00:05.670' AS DateTime), CAST(N'2021-09-27T14:39:09.107' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (368, 3426, 0, 0, CAST(N'2021-09-26T12:00:01.000' AS DateTime), CAST(N'2021-09-26T21:00:05.673' AS DateTime), CAST(N'2021-09-27T00:00:00.023' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (369, 3427, 0, 0, CAST(N'2021-09-27T00:00:01.000' AS DateTime), CAST(N'2021-09-27T00:00:00.013' AS DateTime), CAST(N'2021-09-28T00:00:17.487' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (370, 3428, 0, 0, CAST(N'2021-09-27T12:00:01.000' AS DateTime), CAST(N'2021-09-27T00:00:00.017' AS DateTime), CAST(N'2021-09-28T00:00:00.547' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (371, 339, 0, 0, CAST(N'2021-09-27T23:43:03.407' AS DateTime), CAST(N'2021-09-27T23:43:03.407' AS DateTime), CAST(N'2021-09-28T18:00:16.490' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (372, 3429, 0, 0, CAST(N'2021-09-28T00:00:01.000' AS DateTime), CAST(N'2021-09-28T00:00:00.530' AS DateTime), CAST(N'2021-09-29T00:00:17.273' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (373, 3430, 0, 0, CAST(N'2021-09-28T12:00:01.000' AS DateTime), CAST(N'2021-09-28T00:00:00.533' AS DateTime), CAST(N'2021-09-29T00:00:17.043' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (374, 340, 0, 0, CAST(N'2021-09-28T21:23:58.580' AS DateTime), CAST(N'2021-09-28T21:23:58.807' AS DateTime), CAST(N'2021-09-30T08:59:30.627' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (375, 3431, 0, 0, CAST(N'2021-09-29T00:00:01.000' AS DateTime), CAST(N'2021-09-29T00:00:17.033' AS DateTime), CAST(N'2021-09-30T00:00:41.217' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (376, 3432, 0, 0, CAST(N'2021-09-29T12:00:01.000' AS DateTime), CAST(N'2021-09-29T00:00:17.037' AS DateTime), CAST(N'2021-09-30T00:00:11.227' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (377, 312, 0, 0, CAST(N'2021-09-29T08:43:44.780' AS DateTime), CAST(N'2021-09-29T08:43:45.177' AS DateTime), CAST(N'2021-09-30T08:59:26.213' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (378, 340, 0, 0, CAST(N'2021-09-29T08:46:39.990' AS DateTime), CAST(N'2021-09-29T08:46:40.390' AS DateTime), CAST(N'2021-09-30T09:00:14.827' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (379, 341, 0, 0, CAST(N'2021-09-29T20:59:13.967' AS DateTime), CAST(N'2021-09-29T20:59:13.913' AS DateTime), CAST(N'2021-10-04T07:08:18.357' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (380, 3433, 0, 0, CAST(N'2021-09-30T00:00:01.000' AS DateTime), CAST(N'2021-09-30T00:00:11.213' AS DateTime), CAST(N'2021-10-01T00:00:32.923' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (381, 3434, 0, 0, CAST(N'2021-09-30T12:00:01.000' AS DateTime), CAST(N'2021-09-30T00:00:11.217' AS DateTime), CAST(N'2021-10-01T00:00:27.327' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (382, 342, 0, 0, CAST(N'2021-09-30T21:24:51.390' AS DateTime), CAST(N'2021-09-30T21:24:51.823' AS DateTime), CAST(N'2021-10-04T07:08:13.713' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (383, 3435, 0, 0, CAST(N'2021-10-01T00:00:01.000' AS DateTime), CAST(N'2021-10-01T00:00:27.317' AS DateTime), CAST(N'2021-10-02T00:00:05.573' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (384, 3436, 0, 0, CAST(N'2021-10-01T12:00:01.000' AS DateTime), CAST(N'2021-10-01T00:00:27.317' AS DateTime), CAST(N'2021-10-02T00:00:27.387' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (385, 343, 0, 0, CAST(N'2021-10-01T22:12:43.230' AS DateTime), CAST(N'2021-10-01T22:12:43.600' AS DateTime), CAST(N'2021-10-05T18:00:42.383' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (386, 3437, 0, 0, CAST(N'2021-10-02T00:00:01.000' AS DateTime), CAST(N'2021-10-02T00:00:05.560' AS DateTime), CAST(N'2021-10-02T12:00:29.547' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (387, 3438, 0, 0, CAST(N'2021-10-02T12:00:01.000' AS DateTime), CAST(N'2021-10-02T00:00:05.563' AS DateTime), CAST(N'2021-10-03T23:00:43.383' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (388, 3439, 0, 0, CAST(N'2021-10-03T00:00:01.000' AS DateTime), CAST(N'2021-10-03T23:00:43.387' AS DateTime), CAST(N'2021-10-04T00:00:32.350' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (389, 3440, 0, 0, CAST(N'2021-10-03T12:00:01.000' AS DateTime), CAST(N'2021-10-03T23:00:43.387' AS DateTime), CAST(N'2021-10-04T07:07:47.463' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (390, 3441, 0, 0, CAST(N'2021-10-04T00:00:01.000' AS DateTime), CAST(N'2021-10-04T00:00:32.340' AS DateTime), CAST(N'2021-10-05T00:00:00.640' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (391, 3442, 0, 0, CAST(N'2021-10-04T12:00:01.000' AS DateTime), CAST(N'2021-10-04T00:00:32.340' AS DateTime), CAST(N'2021-10-05T00:01:00.580' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (392, 3443, 0, 0, CAST(N'2021-10-05T00:00:01.000' AS DateTime), CAST(N'2021-10-05T00:00:00.623' AS DateTime), CAST(N'2021-10-06T00:00:39.033' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (393, 3444, 0, 0, CAST(N'2021-10-05T12:00:01.000' AS DateTime), CAST(N'2021-10-05T00:00:00.630' AS DateTime), CAST(N'2021-10-06T00:00:09.030' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (394, 3445, 0, 0, CAST(N'2021-10-06T00:00:01.000' AS DateTime), CAST(N'2021-10-06T00:00:09.020' AS DateTime), CAST(N'2021-10-07T00:00:04.357' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (395, 3446, 0, 0, CAST(N'2021-10-06T12:00:01.000' AS DateTime), CAST(N'2021-10-06T00:00:09.020' AS DateTime), CAST(N'2021-10-07T00:00:34.327' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (396, 344, 0, 0, CAST(N'2021-10-06T06:27:49.390' AS DateTime), CAST(N'2021-10-06T06:27:49.600' AS DateTime), CAST(N'2021-10-07T18:00:08.313' AS DateTime), 1, N'esmadraso', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (397, 3447, 0, 0, CAST(N'2021-10-07T00:00:01.000' AS DateTime), CAST(N'2021-10-07T00:00:04.337' AS DateTime), CAST(N'2021-10-08T00:00:21.287' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (398, 3448, 0, 0, CAST(N'2021-10-07T12:00:01.000' AS DateTime), CAST(N'2021-10-07T00:00:04.343' AS DateTime), CAST(N'2021-10-08T00:00:08.193' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (399, 345, 0, 0, CAST(N'2021-10-07T23:07:36.280' AS DateTime), CAST(N'2021-10-07T23:07:36.443' AS DateTime), CAST(N'2021-10-11T13:38:36.947' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (400, 3449, 0, 0, CAST(N'2021-10-08T00:00:01.000' AS DateTime), CAST(N'2021-10-08T00:00:08.180' AS DateTime), CAST(N'2021-10-09T00:00:43.943' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (401, 3450, 0, 0, CAST(N'2021-10-08T12:00:01.000' AS DateTime), CAST(N'2021-10-08T00:00:08.183' AS DateTime), CAST(N'2021-10-09T00:00:13.947' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (402, 346, 0, 0, CAST(N'2021-10-08T23:07:35.717' AS DateTime), CAST(N'2021-10-08T23:07:35.667' AS DateTime), CAST(N'2021-10-11T13:38:49.693' AS DateTime), 1, N'khdiagan', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (403, 3451, 0, 0, CAST(N'2021-10-09T00:00:01.000' AS DateTime), CAST(N'2021-10-09T00:00:13.937' AS DateTime), CAST(N'2021-10-10T21:02:49.950' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (404, 3452, 0, 0, CAST(N'2021-10-09T12:00:01.000' AS DateTime), CAST(N'2021-10-09T00:00:13.937' AS DateTime), CAST(N'2021-10-09T12:00:56.473' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (405, 347, 0, 0, CAST(N'2021-10-10T21:02:12.707' AS DateTime), CAST(N'2021-10-10T21:02:12.650' AS DateTime), CAST(N'2021-10-11T18:00:41.260' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (406, 3453, 0, 0, CAST(N'2021-10-10T00:00:01.000' AS DateTime), CAST(N'2021-10-10T21:02:49.900' AS DateTime), CAST(N'2021-10-11T13:39:45.277' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (407, 3454, 0, 0, CAST(N'2021-10-10T12:00:01.000' AS DateTime), CAST(N'2021-10-10T21:02:49.903' AS DateTime), CAST(N'2021-10-11T00:00:03.250' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (408, 3455, 0, 0, CAST(N'2021-10-11T00:00:01.000' AS DateTime), CAST(N'2021-10-11T00:00:03.237' AS DateTime), CAST(N'2021-10-12T00:00:41.177' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (409, 3456, 0, 0, CAST(N'2021-10-11T12:00:01.000' AS DateTime), CAST(N'2021-10-11T00:00:03.240' AS DateTime), CAST(N'2021-10-12T00:00:15.437' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (410, 348, 1, 0, CAST(N'2021-10-11T21:17:47.170' AS DateTime), CAST(N'2021-10-11T21:17:47.530' AS DateTime), CAST(N'2021-10-11T21:17:47.530' AS DateTime), 1, N'jtalaugon', NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (411, 3457, 1, 0, CAST(N'2021-10-12T00:00:01.000' AS DateTime), CAST(N'2021-10-12T00:00:15.423' AS DateTime), CAST(N'2021-10-12T12:00:02.137' AS DateTime), 0, NULL, NULL)
GO
INSERT [dbo].[sequence] ([id], [sequence_id], [is_open], [is_manual], [date_created], [created_at], [updated_at], [is_fabricated], [created_by], [updated_by]) VALUES (412, 3458, 0, 0, CAST(N'2021-10-12T12:00:01.000' AS DateTime), CAST(N'2021-10-12T00:00:15.423' AS DateTime), CAST(N'2021-10-12T12:00:02.163' AS DateTime), 0, NULL, NULL)
GO
SET IDENTITY_INSERT [dbo].[sequence] OFF
GO
ALTER TABLE [dbo].[sequence] ADD  DEFAULT ('0') FOR [is_open]
GO
ALTER TABLE [dbo].[sequence] ADD  DEFAULT ('0') FOR [is_manual]
GO
ALTER TABLE [dbo].[sequence] ADD  DEFAULT (getdate()) FOR [date_created]
GO
ALTER TABLE [dbo].[sequence] ADD  DEFAULT ('0') FOR [is_fabricated]
GO
CREATE TABLE [dbo].[users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](191) NOT NULL,
	[username] [nvarchar](191) NOT NULL,
	[email] [nvarchar](max) NULL,
	[email_verified_at] [datetime] NULL,
	[password] [nvarchar](191) NOT NULL,
	[remember_token] [nvarchar](100) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[is_fabricated] [bit] NULL,
	[can_open_sequence] [bit] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[users] ON 
GO
INSERT [dbo].[users] ([id], [name], [username], [email], [email_verified_at], [password], [remember_token], [created_at], [updated_at], [is_fabricated], [can_open_sequence]) VALUES (1, N'admin', N'admin', NULL, NULL, N'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', N'', CAST(N'2020-11-28T05:15:26.000' AS DateTime), CAST(N'2020-11-28T05:15:26.000' AS DateTime), 1, NULL)
GO
SET IDENTITY_INSERT [dbo].[users] OFF
GO
ALTER TABLE [dbo].[users] ADD  DEFAULT ('FALSE') FOR [can_open_sequence]
GO